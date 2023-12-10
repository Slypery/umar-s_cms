<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<div class="w-screen h-screen flex">
    <div class="m-auto p-5 pb-7 w-[400px] rounded-lg shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] bg-neutral-700">
        <h1 class="text-3xl mb-3">Verify your email</h1>
        <form method="post" action="<?= base_url('auth/sign_up_step_3') ?>" id="verf"></form>
        <!--E-mail input-->
        <?php
        if (!empty($sign_up_data['wrong_code'])) {
            echo 
            '<div class="bg-red-500 bg-opacity-20 p-2 border border-red-700 rounded-md text-red-500">
                wrong verification code!
            </div>';
        }
        ?>
        <p>Please enter the 6 digit code we've send to<br><?= $sign_up_data['email'] ?></p>
        <div class="relative" data-te-input-wrapper-init>
            <input type="number" form="verf" required name="otp" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="input_username" placeholder="Example label" />
            <label for="input_username" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
            </label>
        </div>
        <div class="flex">
            <p class="ml-auto mr-1 text-sm text-blue-700 underline opacity-70 cursor-default mb-2" id="cd"></p>
        </div>

        <!--Submit button-->
        <button type="submit" form="verf" class="inline-block w-full rounded bg-[#3B71CA]  px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
            verify
        </button>
    </div>
</div>
<div class="hidden" id="cooldown"><?= $sign_up_data['cooldown'] ?></div>
<div class="hidden" id="current_time"><?= time() ?></div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        cd = parseInt(document.getElementById('cooldown').innerHTML);
        ct = parseInt(document.getElementById('current_time').innerHTML);
        cddiv = document.getElementById('cd');

        document.getElementById('cooldown').remove;
        document.getElementById('current_time').remove;

        function loop() {
            if (cd + 60 > ct) {
                ct++;
                cooldown = 60 - (ct - cd);
                cddiv.innerHTML = 'resend(' + cooldown + ')';
                setTimeout(loop, 1000);
            } else {
                cddiv.innerHTML = `
                <form action="<?= base_url("auth/sign_up") ?>" method="post">
                    <button type="submit" class="underline" name="resend" value="1  ">resend</button>
                </form>`;
                cddiv.classList.replace('opacity-70', 'hover:text-purple-500');
            }
        }
        loop();
    })
</script>