<div class="absolute w-full h-[100px] text-2xl font-semibold z-50" style="background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0));">
    <p class="px-5 mt-4"><?= $content_data['title'] ?></p>
    <p class="px-5 text-sm opacity-80">Published <?= DateTime::createFromFormat('Y-m-d', $content_data['date'])->format('d M Y') ?> by <?= $content_data['creator'] ?></p>
</div>
<!-- <div class="w-full h-10 mb-10" ></div> -->
<img class="w-full 2xl:h-[800px] shadow-lg lg:h-[600px] object-cover" src="<?= base_url('assets/img/content/' . $content_data['picture']) ?>" alt="">
<style>
    
    ul {
        list-style-type: disc;
        margin-left: 20px;
    }
    
    ol {
        list-style-type: decimal;
        margin-left: 20px;
    }

    blockquote {
      border: 0 solid #ccc;
      border-left-width: 0.3em;
      margin-left: 0.3em;
      padding-left: 0.6em;
      background: #1a1a1a;
      border-radius: 3px;
      padding-top: 2px;
      padding-bottom: 2px;
    }

    a {
      color: rgb(29 78 216);
      text-decoration: underline;
    }

    a:hover{
      color: rgb(168 85 247);
    }
    
    pre {
        display: inline-block;
        overflow-x: auto;
        max-width: 100%;
        padding: 10px;
        background-color: #494949;
        border-radius: 5px;
    }

    pre::-webkit-scrollbar {
        height: 10px !important;
    }

    pre::-webkit-scrollbar-track {
        background: #121212 !important;
        border-radius: 2px !important;
    }

    pre::-webkit-scrollbar-thumb {
        background: #2d2d2d !important;
        border-radius: 2px !important;
        transition: all 2s !important;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #3c3c3c !important;
    }

    h1 {
        font-size: x-large;
    }
</style>
<div class="p-5 text-neutral-300 content">
    <?= $content_data['content'] ?>
</div