<?php

require_once __DIR__ . "/Book.php";

class Library
{
    private array $books = [];

    public function addBook(Book $book): void {

        $this->books[] = $book;
    }

    public function removeBook(Book $book): void {

        foreach ($this->books as $key => $libraryBook) {
            if ($libraryBook === $book) {
                unset($this->books[$key]);
                return;
            }
        }
    }

    public function updateBook(
        Book $book,
        string $title,
        string $author,
        string $isbn,
        string $genre,
        int $pages
    ): void {
        $book->update($title, $author, $isbn, $genre, $pages); }

    public function getBooks(): array
    {
        return array_values($this->books);
    }

    public function findByTitle(string $title): array {

        return array_values(array_filter(
            $this->books,
            fn(Book $book) => $book->getTitle() === $title
        ));
    }

    public function findByGenre(string $genre): array {

        return array_values(array_filter(
            $this->books,
            fn(Book $book) => $book->getGenre() === $genre
        ));
    }

    public function findByIsbn(string $isbn): array {

        return array_values(array_filter(
            $this->books,
            fn(Book $book) => $book->getIsbn() === $isbn
        ));
    }

    public function findByAuthor(string $author): array {

        return array_values(array_filter(
            $this->books,
            fn(Book $book) => $book->getAuthor() === $author
        ));
    }

    public function findLongBooks(): array {
        
        return array_values(array_filter(
            $this->books,
            fn(Book $book) => $book->getPages() > 500
        ));
    }
}