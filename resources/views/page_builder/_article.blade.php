{{--
@name Article
@desc The article page builder block. It extends the prose typography partial.
@set page.page_builder.article
--}}
<!-- /page_builder/_article.blade.php -->
<section class="fluid-container grid grid-cols-12">
    <x-typography._prose class="contents">
        @foreach($builder['article'] as $article)

            <x-dynamic-component :component="'_'.$article['type']" :content="$article" />

        @endforeach
    </x-typography._prose>
</section>
<!-- End: /page_builder/_article.blade.php -->
