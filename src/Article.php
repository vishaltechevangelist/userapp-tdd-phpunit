<?php
namespace TDDApp;

class Article {
    public $title;

    public function getSlug(): string {
        $slug = $this->title??"";
        if ($slug != "") {
            //$slug = str_replace(" ", "_", $slug);
            $slug = preg_replace("/\s+/", "_", $slug);
            $slug = trim($slug, "_");
        }
        return $slug;
    }
}