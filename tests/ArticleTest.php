<?php
namespace TDDApp\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use TDDApp\Article;

class ArticleTest extends TestCase {

    protected $article;

    public function setUp() : void {
        $this->article = new Article;
    }

    public function testTitleIsEmptyByDefault() {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle() {
        //$this->assertEquals($article->getSlug(), "");
        $this->assertSame($this->article->getSlug(), "");
    }

    // public function testSlugHasSpaceReplacedByUnderscores() {
    //     $this->article->title = "An example article";
    //     $this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugHasMultipleWhiteSpaceReplacedByUnderscore() {
    //     $this->article->title = "An    example  \n  article";
    //     $this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function testSlugShouldNotStartWithUnderscore() {
    //     $this->article->title = "  An    example \n     article  ";
    //     $this->assertEquals($this->article->getSlug(), "An_example_article");
    // }

    // public function  testSlugDoesNotHaveAnyNonWordCharacters() {
    //     $this->article->title = "READ! THIS! EXAMPLE!";
    //     $this->assertEquals($this->article->getSlug(), "READ_THIS_EXAMPLE");
    // }

    
    public static function titleProvider() : array {
        return [
            ["An example article","An_example_article"],
            ["An    example  \n  article", "An_example_article"],
            ["  An    example \n     article  ", "An_example_article   "],
            ["READ! THIS! EXAMPLE!", "READ_THIS_EXAMPLE"],
        ];
    }

    #[DataProvider('titleProvider')]
    public function testSlug($title, $slug) {
        $this->article->title = $title;
        $this->assertEquals($this->article->getSlug(), $slug);
    }
}