<?php

require_once __DIR__ . "/Library.php";

use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase {

    public function testAddBook(): void {

        $library = new Library();

        $book = new Book(
            "1984", "George Orwell", "123456789", "Dystopia", 328);


        $library->addBook($book);

        $this->assertCount(1, $library->getBooks());
        $this->assertSame($book, $library->getBooks()[0]);
    }

    public function testRemoveBook(): void {
        $library = new Library();

        $book = new Book(  
            "1984", "George Orwell", "123456789", "Dystopia", 328);

        $library->addBook($book);
        $library->removeBook($book);

        $this->assertCount(0, $library->getBooks());
    }

    public function testUpdateBook(): void {
        $library = new Library();

        $book = new Book(
             "1984", "George Orwell", "123456789", "Dystopia", 328);

        $library->addBook($book);

        $library->updateBook(
            $book, "Animal Farm", "George Orwell", "987654321",
            "Adventure", 112);

        $this->assertSame("Animal Farm", $book->getTitle());
        $this->assertSame("987654321", $book->getIsbn());
        $this->assertSame("Adventure", $book->getGenre());
        $this->assertSame(112, $book->getPages());
    }

    public function testFindByTitle(): void {
        $library = new Library();

        $book = new Book(
            "1984", "George Orwell", "123456789", "Dystopia", 328);
        

        $library->addBook($book);

        $result = $library->findByTitle("1984");

        $this->assertCount(1, $result);
        $this->assertSame($book, $result[0]);
    }

    public function testFindByGenre(): void
    {
        $library = new Library();

        $book = new Book(
            "Dune", "Frank Herbert", "111111111",
            "Science Fiction", 600);

        $library->addBook($book);

        $result = $library->findByGenre("Science Fiction");

        $this->assertCount(1, $result);
        $this->assertSame($book, $result[0]);
    }

    public function testFindByIsbn(): void
    {
        $library = new Library();

        $book = new Book(
            "1984", "George Orwell", "123456789","Dystopia", 328);

        $library->addBook($book);

        $result = $library->findByIsbn("123456789");

        $this->assertCount(1, $result);
        $this->assertSame($book, $result[0]);
    }

    public function testFindByAuthor(): void
    {
        $library = new Library();

        $book = new Book(
            "1984", "George Orwell", "123456789", "Dystopia", 328);

        $library->addBook($book);

        $result = $library->findByAuthor("George Orwell");

        $this->assertCount(1, $result);
        $this->assertSame($book, $result[0]);
    }

    public function testFindLongBooks(): void
    {
        $library = new Library();

        $shortBook = new Book(
            "1984", "George Orwell", "123456789", "Dystopia", 328);

        $longBook = new Book(
            "Dune", "Frank Herbert", "111111111", "Science Fiction", 600);


        $library->addBook($shortBook);
        $library->addBook($longBook);

        $result = $library->findLongBooks();

        $this->assertCount(1, $result);
        $this->assertSame($longBook, $result[0]);
    }

    public function testInvalidGenre(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Book(
            "Unknown Book", "Unknown Author", "000000000",
            "Horror", 300);
    }
}