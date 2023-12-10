<div class="p-6 page hidden" id="config_page">
  <ol class="list-reset flex m-2  align-middle">
    <li class="text-neutral-400">Carousel</li>
    <li><span class="mx-1 text-neutral-300">/</span></li>
    <li class="text-neutral-200">table</li>

    <li class="ml-auto">
      <a href="<?= base_url('admin/carousel/add_carousel') ?>">
        <button type="button" class="rounded border-2 border-neutral-50 px-[10px] py-[5px] text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init>
          Add Carousel
        </button>
      </a>
    </li>
  </ol>
  <div data-te-datatable-init class="rounded-lg overflow-auto uhh">
    <table style="table-layout: fixed;">
      <thead>
        <tr>
          <th>Title</th>
          <th>Subtitle</th>
          <th>Picture</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($carousel_data as $i) {
          echo '<tr>';
          echo '<td>' . $i['title'] . '</td>';
          echo '<td>' . wordwrap($i['subtitle'], 75, '<br>') . '</td>';
          echo '<td><a class="text-blue-700 underline hover:text-purple-500" target="/blank" href="' . base_url('assets/img/carousel/') . $i['picture'] . '">' . $i['picture'] . '</a></td>';
          echo
          '<td>
          <div class="flex">
            <button type="submit" name="carousel_id" value="' . $i['carousel_id'] . '" form="form_edit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(50,50,155)" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>
            </button>
            <button onclick="delete_carousel(&quot;' . $i['carousel_id'] . '&quot;, &quot;' . $i['title'] . '&quot;, &quot;' . $i['picture'] . '&quot;)" data-te-toggle="modal" data-te-target="#staticBackdrop" data-te-ripple-init data-te-ripple-color="light">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="rgb(155,50,50)" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
              </svg>
            </button>
          </div>
          </td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Form Edit -->
<form action="<?= base_url('admin/carousel/edit_carousel') ?>" method="post" id="form_edit"></form>
<!-- /Form Edit -->

<!-- Modal Delete -->
<script>
  function delete_carousel(id, title, picture) {
    document.getElementById('delete_modal_body').innerHTML = "title = " + title;
    document.getElementById('carousel_id').value = id;
    document.getElementById('picture').value = picture;
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
      <div data-te-modal-body-ref class="relative p-4 flex" id="delete_modal_body"></div>

      <!--Modal footer-->
      <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button type="button" class="inline-block rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
          Cancel
        </button>
        <form action="<?= base_url('controlleradmin/carousel_page_delete_carousel') ?>" method="post">
          <input type="hidden" name="carousel_id" id="carousel_id">
          <input type="hidden" name="picture" id="picture">
          <button type="submit" class="ml-1 inline-block rounded bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]" data-te-ripple-init data-te-ripple-color="light">
            delete
          </button>
        </form>
      </div>
    </div>
  </div>
</div>