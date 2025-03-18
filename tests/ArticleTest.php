<?php
namespace TDDApp\Tests;

use PHPUnit\Framework\TestCase;
use TDDApp\Article;

class ArticleTest extends TestCase {

    public function testTitleIsEmptyByDefault() {
        $article = new Article;
        $this->assertEmpty($article->title);
    }

    public function testSlugIsEmptyWithNoTitle() {
        $article = new Article;
        //$this->assertEquals($article->getSlug(), "");
        $this->assertSame($article->getSlug(), "");
    }

}