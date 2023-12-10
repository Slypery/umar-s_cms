</div>
<!-- Content -->
<script>
    setInterval(() => {
        const apacona = document.getElementsByClassName('undefined')[0];
        apacona.classList.add('hidden');
    }, 10);

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementsByClassName('page')[0].classList.remove('hidden');
        document.getElementById('loading').classList.add('hidden');
        let btn_group = document.getElementsByClassName('trix-button-group--file-tools')[0];
        if (btn_group) {
            btn_group.remove();
        }
    })
</script>

<style>
    .uhh>div.touch-none {
        height: calc(100vh - 150px);
    }

    @media only screen and (max-width: 768px) {
        .uhh>div.touch-none {
            height: calc(100vh - 200px);
        }
    }

    @media only screen and (max-width: 640px) {
        .uhh>div.touch-none {
            height: calc(100vh - 300px);
        }
    }

    table thead th {
        padding: 3px;
        position: sticky;
        top: 0;
        z-index: 1;
        background-color: rgb(38 38 38);
    }

    th:first-child {
        position: sticky;
        left: 0;
        z-index: 40;
        background-color: rgb(38 38 38);
    }

    td:first-child {
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: rgb(38 38 38);
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>