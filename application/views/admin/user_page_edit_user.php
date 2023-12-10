<div class="p-6 page hidden" id="user_page">
  <ol class="list-reset flex m-2  align-middle">
    <li class="text-neutral-600"><a href="<?= base_url('admin/user') ?>">User</a></li>
    <li><span class="mx-1 text-neutral-500">/</span></li>
    <li class="text-neutral-400"><a href="<?= base_url('admin/user') ?>">table</a></li>
    <li><span class="mx-1 text-neutral-300">/</span></li>
    <li class="text-neutral-200">edit_user</li>
  </ol>

  <form action="<?= base_url('admin/user/do_edit_user') ?>" method="post" class="bg-neutral-800 p-5 rounded-lg">
    <span class="flex mb-3 text-2xl">Edit User</span>
    <div class="flex max-md:inline gap-2">
      <div class="w-full mb-2">
        <div class="relative" data-te-input-wrapper-init>
          <input type="text" name="name" value="<?= $user_data['name'] ?>" required class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_name" aria-describedby="emailHelp" placeholder="Enter email" />
          <label for="input_name" class="bg-[#262626] pr-1 z-50 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
            Name
          </label>
        </div>
      </div>
      <div class="w-full mb-2">
        <div class="relative" data-te-input-wrapper-init>
          <input type="text" name="email" value="<?= $user_data['email'] ?>" required class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_name" aria-describedby="emailHelp" placeholder="Enter email" />
          <label for="input_name" class="bg-[#262626] pr-1 z-50 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
            Email
          </label>
        </div>
      </div>
    </div>

    <button type="submit" class="inline-block w-full mt-2 rounded bg-[#3B71CA] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
      save changes
    </button>
  </form>
</div>