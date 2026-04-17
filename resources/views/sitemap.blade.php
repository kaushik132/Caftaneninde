@php
    echo '<?xml version="1.0" encoding="UTF-8"?>'
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{url('/')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>


    @foreach ($category as $category)

    <url>
        <loc>{{url('/')}}/products?categories[]={{$category->id}}</loc>
        <lastmod>{{$category->created_at->tz('UTC')->toAtomString()}}</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @foreach ($product as $product)

    <url>
        <loc>{{url('/')}}/product-details/{{$product->slug}}</loc>
        <lastmod>{{$product->created_at->tz('UTC')->toAtomString()}}</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach






    @foreach ($blogCategory as $blogCategory)

    <url>
        <loc>{{url('/')}}/blogs/{{$blogCategory->slug}}</loc>
        <lastmod>{{$blogCategory->created_at->tz('UTC')->toAtomString()}}</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach



       @foreach ($blog as $blog)

    <url>
        <loc>{{url('/')}}/blog-details/{{$blog->slug}}</loc>
        <lastmod>{{$blog->created_at->tz('UTC')->toAtomString()}}</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

     <url>
        <loc>{{url('/contact-us')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
     <url>
        <loc>{{url('/wishlist')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
     <url>
        <loc>{{url('/account')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
     <url>
        <loc>{{url('/cart')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
     <url>
        <loc>{{url('/login')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>
     <url>
        <loc>{{url('/register')}}</loc>
        <lastmod>2025-06-02T07:54:52+00:00</lastmod>
        <changefreq>Weekly</changefreq>
        <priority>0.8</priority>
    </url>




</urlset>
