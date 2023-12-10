<div class="p-6 page hidden" id="content_page">
  <ol class="list-reset flex m-2  align-middle">
    <li class="text-neutral-600"><a href="<?= base_url('user/content') ?>">Content</a></li>
    <li><span class="mx-1 text-neutral-500">/</span></li>
    <li class="text-neutral-400"><a href="<?= base_url('user/content') ?>">table</a></li>
    <li><span class="mx-1 text-neutral-300">/</span></li>
    <li class="text-neutral-200">add_content</li>
  </ol>

  <!-- <form> --><?php echo form_open_multipart(base_url('user/content/do_add_content')); ?>

  <div class="bg-neutral-800 p-5 rounded-lg">
    <span class="flex mb-3 text-2xl">Add Content</span>
    <div class="w-full mb-2">
      <div class="relative" data-te-input-wrapper-init>
        <input type="text" name="title" value="<?= set_value('title') ?>" required class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_name" aria-describedby="emailHelp" placeholder="Enter email" />
        <label for="input_name" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
          Title
        </label>
      </div>
    </div>
    <div class="flex gap-1 max-md:block">
      <select name="category" data-te-select-init required>
        <?php
        foreach ($category as $i) {
          echo '<option value="' . $i['category_id'] . '">' . $i['category'] . '</option>';
        }
        ?>
      </select>
      <input type="file" name="content_picture" accept="image/*" required class="max-md:mt-2 w-full block h-[35px] w-[400px] max-lg:w-full mb-2 text-sm text-neutral-400 border rounded border-[#4A4A4B] file:mr-4  file:py-[6px]  file:px-4 file:border-r file:border-0 file:border-[#4A4A4B] file:border-solid file:text-sm  file:font-semibold file:bg-transparent  file:text-neutral-100 hover:file:bg-neutral-400/10" />
    </div>

    <!-- <div class="relative mb-3" data-te-input-wrapper-init>
      <textarea name="content" required class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="content" rows="3" placeholder="Your message"><?= set_value('content') ?></textarea>
      <label for="content" class="pt-0 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Content</label>
    </div> -->

    <div class="px-5 py-3 border-[1px] border-neutral-600 rounded-md mb-3 bg-neutral-70">
      <span class="flex mb-3 text-xl">Content</span>
      <trix-editor class="trix-content bg-neutral-800" input="input_content"></trix-editor>
      <input type="hidden" id="input_content" name="content">
    </div>

    <button type="submit" class="inline-block w-full rounded bg-[#3B71CA] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
      Add
    </button>
  </div>

  <!-- </form> --></form>

</div>