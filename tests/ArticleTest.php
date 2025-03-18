<?php
namespace TDDApp\Tests;

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

    public function testSlugHasSpaceReplacedByUnderscores() {
        $this->article->title = "An example article";
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasMultipleWhiteSpaceReplacedByUnderscore() {
        $this->article->title = "An    example  \n  article";
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugShouldNotStartWithUnderscore() {
        $this->article->title = "  An    example \n     article  ";
        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }
}