<div class="p-6 page hidden" id="user_page">
  <ol class="list-reset flex m-2  align-middle">
    <li class="text-neutral-400">Configuration</li>
    <li><span class="mx-1 text-neutral-300">/</span></li>
    <li class="text-neutral-200">edit</li>
  </ol>

  <form action="<?= base_url('controlleradmin/config_page_do_edit_config') ?>" method="post" class="bg-neutral-800 p-5 rounded-lg">
    <span class="flex mb-3 text-2xl">Configuration</span>
    <div class="flex max-md:inline gap-2">

      <div class="w-full mb2">
        <div class="relative mb-6" data-te-input-wrapper-init>
          <input type="text" name="about_title" value="<?= $config_data['about_title'] ?>" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_about_title" data-te-input-showcounter="true" maxlength="60" />
          <label for="input_about_title" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
            About Title
          </label>
          <div class="absolute w-full text-sm text-neutral-500 peer-focus:text-primary dark:text-neutral-500 dark:peer-focus:text-primary" data-te-input-helper-ref></div>
        </div>
      </div>

      <div class="w-full mb-2">
        <div class="relative" data-te-input-wrapper-init>
          <input type="email" name="email" value="<?= $config_data['email'] ?>" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_email" aria-describedby="emailHelp" />
          <label for="input_email" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
            E-mail
          </label>
        </div>
      </div>
    </div>

    <div class="relative mb-6" data-te-input-wrapper-init>
      <textarea name="about" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_about" rows="3" data-te-input-showcounter="true" maxlength="240"><?= $config_data['about'] ?></textarea>
      <label for="input_about" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
        About
      </label>
      <div class="absolute w-full text-sm text-neutral-500 peer-focus:text-primary dark:text-neutral-500 dark:peer-focus:text-primary" data-te-input-helper-ref></div>
    </div>

    <div class="flex mb-3">
      <div class="relative w-full mr-2" data-te-input-wrapper-init>
        <input type="text" name="instagram" value="<?= $config_data['instagram'] ?>" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_instagram" />
        <label for="input_instagram" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
          Instagram
        </label>
      </div>

      <div class="relative w-full mr-2" data-te-input-wrapper-init>
        <input type="text" name="facebook" value="<?= $config_data['facebook'] ?>" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_facebook" />
        <label for="input_facebook" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
          Facebook
        </label>
      </div>

      <div class="relative w-full" data-te-input-wrapper-init>
        <input type="text" name="twitter" value="<?= $config_data['twitter'] ?>" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_twitter" />
        <label for="input_twitter" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
          Twitter
        </label>
      </div>
    </div>

    <div class="relative w-full mb-6" data-te-input-wrapper-init>
      <input type="text" name="address" value="<?= $config_data['address'] ?>" class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_twitter" />
      <label for="input_twitter" class="bg-neutral-800 z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
        Address
      </label>
    </div>

    <button type="submit" id="submit" class="inline-block w-full hidden rounded bg-[#3B71CA] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
      Save
    </button>
    <button id="disabled_submit" class="inline-block w-full visible rounded border-2 border-[#354366] px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-[#354366] transition duration-150 ease-in-out cursor-default">
      save
    </button>
  </form>
  <script>
    let input_form = document.getElementsByClassName('input_form');
    let disabled_submit = document.getElementById('disabled_submit')
    let submit = document.getElementById('submit')
    for (let i = 0; i < input_form.length; i++) {
      input_form[i].addEventListener('input', function (e){
        disabled_submit.classList.add('hidden');
        submit.classList.remove('hidden');
      })
    }
  </script>
</div>