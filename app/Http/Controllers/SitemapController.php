<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Certificate;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $certificates = Certificate::orderBy('issued_year', 'desc')->get();

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . url('/') . '</loc>';
        $sitemap .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
        $sitemap .= '<changefreq>weekly</changefreq>';
        $sitemap .= '<priority>1.0</priority>';
        $sitemap .= '</url>';

        // Projects (if you want to add individual project pages in the future)
        foreach ($projects as $project) {
            $sitemap .= '<url>';
            $sitemap .= '<loc>' . url('/#works') . '</loc>';
            $sitemap .= '<lastmod>' . $project->updated_at->toAtomString() . '</lastmod>';
            $sitemap .= '<changefreq>monthly</changefreq>';
            $sitemap .= '<priority>0.8</priority>';
            $sitemap .= '</url>';
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }
}
