-- create users roles table
CREATE TABLE roles(
  id SERIAL PRIMARY KEY UNIQUE NOT NULL,
  role VARCHAR UNIQUE NOT NULL
);

-- create users table
CREATE TABLE users(
  id SERIAL PRIMARY KEY UNIQUE NOT NULL,
  email VARCHAR UNIQUE NOT NULL,
  username VARCHAR(30) UNIQUE NOT NULL,
  password VARCHAR(128) NOT NULL,
  role_id INTEGER NOT NULL,
  FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- create courses table
CREATE TABLE courses(
  code VARCHAR PRIMARY KEY NOT NULL, -- the code of the course
  name VARCHAR NOT NULL,             -- the beauty name given to the course
  professor VARCHAR NOT NULL         -- the name of the professor that holds the course
);

-- create lessons table
CREATE TABLE lessons(
  id SERIAL PRIMARY KEY UNIQUE NOT NULL,  -- the id of the lesson
  course_code VARCHAR NOT NULL,           -- the code of the course to which the lesson is associated
  date DATE NOT NULL,                     -- the date of the lesson
  lesson_start TIME NOT NULL,             -- the start time of the lesson
  lesson_end TIME NOT NULL,               -- the end time of the lesson
  classroom VARCHAR NOT NULL,             -- the name of the classroom where the lesson will take place
  FOREIGN KEY (course_code) REFERENCES courses(code) ON UPDATE CASCADE ON DELETE CASCADE,
  CHECK(lesson_start < lesson_end)
);

-- create notes table
CREATE TABLE notes(
  id SERIAL PRIMARY KEY UNIQUE NOT NULL,
  lesson_id INTEGER NOT NULL,
  user_id INTEGER NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT NOW(),
  FOREIGN KEY (lesson_id) REFERENCES lessons(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- create the search function that allows to retrieve the lessons that match search params
CREATE OR REPLACE FUNCTION search_notes(IN query_str text) 
  RETURNS TABLE(
            id int,
            content text,
            created_at timestamp,
            updated_at timestamp,
            date DATE,
            classroom varchar,
            code varchar,
            name varchar,
            username varchar,
            weight real
          ) AS $$
  BEGIN
    -- return a table with interest columns
    RETURN QUERY  SELECT n.id, n.content, n.created_at, n.updated_at, l.date, l.classroom, c.code, c.name, u.username, s.score
                  FROM (
                        -- use to_tsvector, to_tsquery and ts_rank_cd functions to find
                        -- the lessons that match search parameters and to rank them according
                        -- to a search weight that indicates how much the lesson matches search parameters
                        SELECT 
                          n.id,
                          ts_rank_cd(
                            -- prepare a tsvector from the data involved in search 
                            to_tsvector(
                              -- use the coalesce function to prevent fails when the value of at least one
                              -- of interest columns is NULL
                              COALESCE(n.content::text,'') || ' ' ||
                              COALESCE(l.date::text,'') || ' ' ||
                              COALESCE(c.code::text,'') || ' ' ||
                              COALESCE(c.name::text,'') || ' ' ||
                              COALESCE(u.username::text,'')
                            ),
                            -- convert the query string to a tsquery by using the plainto_tsquery function
                            plainto_tsquery(query_str)
                          ) AS score
                        FROM notes AS n
                             JOIN users AS u ON n.user_id=u.id
                             JOIN lessons AS l ON n.lesson_id=l.id
                             JOIN courses AS c ON l.course_code=c.code
                       ) AS s
                       -- retrieve the information of the found lesson
                       JOIN notes AS n ON s.id=n.id
                       JOIN users AS u ON n.user_id=u.id
                       JOIN lessons AS l ON n.lesson_id=l.id
                       JOIN courses AS c ON l.course_code=c.code
                  -- return only the results that match search all parameters
                  WHERE score > 0
                  -- order search results by search rank value
                  ORDER BY score DESC;
  END;
$$ LANGUAGE plpgsql;