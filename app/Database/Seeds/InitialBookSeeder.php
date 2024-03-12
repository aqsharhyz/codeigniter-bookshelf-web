<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialBookSeeder extends Seeder
{
    public function run()
    {
        //add books
        $data = [
            [
                'name' => 'The Great Gatsby',
                'user_id' => 1,
                'year' => 1925,
                'author' => 'F. Scott Fitzgerald',
                'summary' => 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.',
                'publisher' => 'Scribner',
                'pageCount' => 218,
                'readPage' => 21,
                'finished' => false,
                'reading' => true,
            ],
            [
                'name' => 'The Hobbit',
                'user_id' => 1,
                'year' => 1937,
                'author' => 'J. R. R. Tolkien',
                'summary' => 'The Hobbit, or There and Back Again is a children\'s fantasy novel by English author J. R. R. Tolkien. It was published on 21 September 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction.',
                'publisher' => 'George Allen & Unwin',
                'pageCount' => 310,
                'readPage' => 10,
                'finished' => false,
                'reading' => true,
            ],
            [
                'name' => 'The Catcher in the Rye',
                'user_id' => 2,
                'year' => 1951,
                'author' => 'J. D. Salinger',
                'summary' => 'The Catcher in the Rye is a novel by J. D. Salinger, partially published in serial form in 1945–1946 and as a novel in 1951. It was originally intended for adults but is read by adolescents for its themes of angst, alienation, and as a critique on superficiality in society.',
                'publisher' => 'Little, Brown and Company',
                'pageCount' => 220,
                'readPage' => 3,
                'finished' => false,
                'reading' => true,
            ],
            [
                'name' => 'To Kill a Mockingbird',
                'user_id' => 2,
                'year' => 1960,
                'author' => 'Harper Lee',
                'summary' => 'To Kill a Mockingbird is a novel by Harper Lee published in 1960. Instantly successful, widely read in high schools and middle schools in the United States, it has become a classic of modern American literature, winning the Pulitzer Prize.',
                'publisher' => 'J. B. Lippincott & Co.',
                'pageCount' => 324,
                'readPage' => 64,
                'finished' => true,
                'reading' => false,
            ],
            [
                'name' => 'Animal Farm',
                'user_id' => 3,
                'year' => 1945,
                'author' => 'George Orwell',
                'summary' => 'Animal Farm is an allegorical novella by George Orwell, first published in England on 17 August 1945. The book tells the story of a group of farm animals who rebel against their human farmer, hoping to create a society where the animals can be equal, free, and happy.',
                'publisher' => 'Secker & Warburg',
                'pageCount' => 112,
                'readPage' => 20,
                'finished' => true,
                'reading' => false,
            ],
            [
                'name' => 'The Lord of the Rings',
                'user_id' => 3,
                'year' => 1955,
                'author' => 'J. R. R. Tolkien',
                'summary' => 'The Lord of the Rings is an epic high fantasy novel by the English author and scholar J. R. R. Tolkien. Set in Middle-earth, the world at some distant time in the past, the story began as a sequel to Tolkien\'s 1937 children\'s book The Hobbit, but eventually developed into a much larger work.',
                'publisher' => 'Allen & Unwin',
                'pageCount' => 1216,
                'readPage' => 0,
                'finished' => false,
                'reading' => false,
            ],
            [
                'name' => 'The Great Gatsby 2',
                'user_id' => 1,
                'year' => 1925,
                'author' => 'F. Scott Fitzgerald',
                'summary' => 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.',
                'publisher' => 'Scribner',
                'pageCount' => 218,
                'readPage' => 21,
                'finished' => false,
                'reading' => true,
            ],
        ];
        $this->db->table('book')->insertBatch($data);
    }
}
