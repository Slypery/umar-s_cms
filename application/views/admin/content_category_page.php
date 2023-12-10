<div class="p-6 page hidden" id="content_category_page">
  <ol class="list-reset flex m-2  align-middle">
    <li class="text-neutral-400">Content_category</li>
    <li><span class="mx-1 text-neutral-300">/</span></li>
    <li class="text-neutral-200">table</li>
  </ol>

  <div class="flex max-md:block gap-1">
    <div class="bg-neutral-800 rounded-lg p-4 max-md:mb-1">
      <span class="flex mb-3 text-2xl text-left">Add Content Category</span>
      <form action="<?= base_url('controlleradmin/content_category_page_add_category') ?>" method="post">
        <div class="relative mb-2" data-te-input-wrapper-init>
          <input type="text" name="category" required class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_name" aria-describedby="emailHelp" placeholder="Enter email" />
          <label for="input_name" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
            Category
          </label>
        </div>
        <button type="submit" class="inline-block w-full rounded bg-[#3B71CA] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
          Add
        </button>
      </form>
    </div>

    <div data-te-datatable-init class="rounded-lg overflow-auto uhh w-full">
      <table>
        <thead>
          <tr>
            <th>Content Category</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($category_data as $i) {
            echo "<tr>";
            echo "<td>" . $i['category'] . "</td>";
            echo
            '<td>
              <div class="flex">
                <button onclick="delete_category(&quot;' . $i['category'] . '&quot;, &quot;' . $i['category_id'] . '&quot;)" data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init data-te-ripple-color="light">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(155,50,50)" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
              </div>
            </td>';
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- Modal Delete -->
<script>
  function delete_category(category, id) {
    document.getElementById('delete_modal_body').innerHTML = "category = " + category + "<br>this will delete all of the content associated with this category!!!";
    document.getElementById('delete_category').value = category;
    document.getElementById('delete_category_id').value = id;
  }
</script>
<div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="staticBackdrop" data-te-backdrop="static" data-te-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
    <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <!--Modal title-->
        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="staticBackdropLabel">
          Are you sure to delete?
        </h5>
        <!--Close button-->
        <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!--Modal body-->
      <div data-te-modal-body-ref class="relative p-4 flex text-start" id="delete_modal_body"></div>

      <!--Modal footer-->
      <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button type="button" class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
          Cancel
        </button>
        <form action="<?= base_url('controlleradmin/content_category_page_delete_category') ?>" method="post">
          <input type="hidden" name="category_id" id="delete_category_id">
          <input type="hidden" name="category" id="delete_category">
          <button type="submit" class="ml-1 inline-block rounded bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]" data-te-ripple-init data-te-ripple-color="light">
            delete
          </button>
        </form>
      </div>
    </div>
  </div>
</div>