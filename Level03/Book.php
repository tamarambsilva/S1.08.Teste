<?php

class Book
{
    private const VALID_GENRES = ["Adventure",
        "Science Fiction","Short Story", "Crime", 
        "Paranormal", "Dystopia", "Fantasy"];

    public function __construct(
        private string $title,
        private string $author,
        private string $isbn,
        private string $genre,
        private int $pages
    ) {
        if (!in_array($genre, self::VALID_GENRES, true)) {
            throw new InvalidArgumentException("Invalid genre");
        }
    }

    public function getTitle(): string {

        return $this->title;
    }

    public function getAuthor(): string {

        return $this->author;
    }

    public function getIsbn(): string {

        return $this->isbn;
    }

    public function getGenre(): string {

        return $this->genre;
    }

    public function getPages(): int {
        
        return $this->pages;
    }

    public function update(
        string $title,
        string $author,
        string $isbn,
        string $genre,
        int $pages
    ): void {
        if (!in_array($genre, self::VALID_GENRES, true)) {
            throw new InvalidArgumentException("Invalid genre");
        }

        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->genre = $genre;
        $this->pages = $pages;
    }
}