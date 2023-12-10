<div class="w-screen h-screen flex">
    <div class="m-auto p-5 pb-7 w-[400px] rounded-lg shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] bg-neutral-700">
        <h1 class="text-3xl mb-3">Send Feedback</h1>
        <form method="post" action="<?= base_url('feedback/submit') ?>">
            <p class="text-sm opacity-50 mb-1 p-1">we will send this to web admins and creators</p>
            <div class="relative mb-6" data-te-input-wrapper-init>
                <textarea name="feedback" required class="input_form peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_feedback" rows="3" data-te-input-showcounter="true" maxlength="240"></textarea>
                <label for="input_feedback" class=" z-50 pr-1 pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate mt-[0.35rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                    write your feedback here
                </label>
                <div class="absolute w-full text-sm text-neutral-500 peer-focus:text-primary dark:text-neutral-500 dark:peer-focus:text-primary" data-te-input-helper-ref></div>
            </div>
            <!--Submit button-->
            <?php
            if ($btn == 1) {
                echo '<button type="submit" class="inline-block w-full rounded bg-[#3B71CA]  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                    submit
                </button>';
            } else {
                echo '<p class="text-sm opacity-50 mb-1 p-1">refresh this page after 10 minutes</p>
                <button type="button" disabled class="inline-block w-full rounded bg-[#25477e]  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#25477e]" data-te-ripple-init data-te-ripple-color="light">
                on cooldown (10 minutes)
                </button>';
            }
            ?>
        </form>
    </div>
</div>