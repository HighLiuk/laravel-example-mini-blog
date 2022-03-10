# Laravel Mini Blog

Mini blog exercise project made with Laravel 9.x

# Table of contents

-   [Database Structure](#database-structure)
-   [References](#references)

## Database Structure

```mermaid
erDiagram

users {
  int       id
  string    name
  string    email
  timestamp email_verified_at
  string    password
  string    remember_token
  timestamp created_at
  timestamp updated_at
}

articles {
  int       id
  int       user_id
  string    title
  string    text
  timestamp created_at
  timestamp updated_at
  timestamp deleted_at
}

categories {
  int       id
  string    name
  timestamp created_at
  timestamp updated_at
  timestamp deleted_at
}

tags {
  int       id
  string    name
  timestamp created_at
  timestamp updated_at
  timestamp deleted_at
}

article_category {
  int       article_id
  int       category_id
}

article_tag {
  int       article_id
  int       tag_id
}

articles   ||..|{ article_category: has
articles   ||..|{ article_tag:      has
categories ||..|{ article_category: has
tags       ||..|{ article_tag:      has
users      ||--o{ articles:         has
```

## References

This project is from a course by [Laravel Daily](https://www.youtube.com/c/LaravelDaily).
The course is [Laravel Eloquent: Expert Level](https://laraveldaily.teachable.com/courses/enrolled/393790).
The mini-blog project is [the last lesson of the course](https://laraveldaily.teachable.com/courses/393790/lectures/6283958).
