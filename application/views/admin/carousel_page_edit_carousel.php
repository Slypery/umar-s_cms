<div class="p-6 page hidden" id="user_page">
  <ol class="list-reset flex m-2  align-middle">
    <li class="text-neutral-600"><a href="<?= base_url('admin/carousel') ?>">Carousel</a></li>
    <li><span class="mx-1 text-neutral-500">/</span></li>
    <li class="text-neutral-400"><a href="<?= base_url('admin/carousel') ?>">table</a></li>
    <li><span class="mx-1 text-neutral-300">/</span></li>
    <li class="text-neutral-200">edit_carousel</li>
  </ol>


  <!-- <form> --><?php echo form_open_multipart('admin/carousel/do_edit_carousel'); ?>

  <div class="bg-neutral-800 p-5 rounded-lg">
    <span class="flex mb-3 text-2xl">Add Carousel</span>
    <div class="flex gap-1 max-lg:block">
      <div class="relative mb-2 w-full" data-te-input-wrapper-init>
        <input type="text" name="title" value="<?= $carousel_data['title'] ?>" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="carousel_title" placeholder="Example label" />
        <label for="carousel_title" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
          Carousel title
        </label>
      </div>
      <input type="file" name="carousel_picture" accept="image/*" class="block h-[35px] w-[400px] max-lg:w-full mb-2 text-sm text-neutral-400 border rounded border-[#4A4A4B] file:mr-4  file:py-[6px]  file:px-4 file:border-r file:border-0 file:border-[#4A4A4B] file:border-solid file:text-sm  file:font-semibold file:bg-transparent  file:text-neutral-100 hover:file:bg-neutral-400/10" />
    </div>
    <div class="relative mb-3" data-te-input-wrapper-init>
      <input type="text" name="subtitle" value="<?= $carousel_data['subtitle'] ?>" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="carousel_subtitle" placeholder="Example label" />
      <label for="carousel_subtitle" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
        Subtitle
      </label>
    </div>
    <button type="submit" class="inline-block w-full rounded bg-[#3B71CA] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
      Save
    </button>
  </div>

  <!-- </form> --></form>

</div>