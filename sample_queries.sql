SELECT * FROM anime WHERE title LIKE "Spy x Family" AND year LIKE 2022 or genre LIKE "Comedy";

-- similar query for php query
SELECT * FROM anime_input WHERE title LIKE "anime_title_input" AND year LIKE "year_input" or genre LIKE "genre_input";
-- more so,
SELECT title, year, description, image_url from anime WHERE title LIKE "Spy x Family" AND year LIKE 2022 or genre LIKE "Comedy";