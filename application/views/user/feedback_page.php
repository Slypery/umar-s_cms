<div class="p-6 page hidden" id="content_category_page">
    <ol class="list-reset flex m-2  align-middle">
        <li class="text-neutral-400">Feedback</li>
        <li><span class="mx-1 text-neutral-300">/</span></li>
        <li class="text-neutral-200">table</li>
    </ol>


    <div class="flex max-md:block gap-1">
        <div data-te-datatable-init class="rounded-lg overflow-auto uhh w-full">
            <table>
                <thead>
                    <tr>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($feedback_data as $i) {
                        echo "<tr>";
                        echo "<td>" . wordwrap($i['feedback'], 75, "<br>") . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>