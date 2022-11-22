<style>
    iframe {
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 1000px;
        border: none;
        overflow: hidden;
        display: block;

    }

    body {
        max-height: 10200px;
    }
</style>

<body style="margin: 0 auto;">
    <div class="container-fluid">
        <a class=" btn btn-success" href="<?= base_url() ?>Ebook">Kembali</a>
        <br>
        <br>
        <table class="table table-striped table-bordered table-hover">
            <?php
            foreach ($data as $row) { ?>
                <tr>
                    <td>ID EBOOK</td>
                    <td><?= $row->id_ebook; ?></td>
                </tr>
                <tr>
                    <td>Nama EBOOK</td>
                    <td><?= $row->nama_ebook; ?></td>
                </tr>
                <tr>
                    <td>Deskripsi EBOOK</td>
                    <td><?= $row->deskripsi_ebook; ?></td>
                </tr>
            <?php }
            ?>
        </table>
        <!-- <input type="button" value="+" onClick="zoomIn()" />
    <input type="button" value="-" onClick="zoomOut()" /> -->
        <center>
            <iframe class="responsive-iframe" id="iframe" title="pdf" src="<?= base_url('assets/upload/') ?><?= $row->pdf; ?>#toolbar=1" frameborder="0" scrolling="no" allowtransparency="true">
            </iframe>
            <!-- <input type=" button" value="+" onClick="zoomIframeScale()" />
            <input type="button" value="-" onClick="zoomOut()" /> -->
        </center>


    </div>
</body>
<!-- <script>
    var fontSize = 1;

    function zoomIn() {
        $('#iframe').css({
            '-ms-zoom': '0.3',
            '-moz-transform': 'scale(0.3)',
            '-moz-transform-origin': '0 0',
            '-o-transform': 'scale(0.3)',
            '-o-transform-origin': ' 0 0',
            '-webkit-transform': 'scale(0.3)',
            '-webkit-transform-origin': '0 0'
        });
    }

    function zoomOut() {
        fontSize -= 0.1;
        document.iframe.style.fontSize = fontSize + "em";
    } -->
<!-- // var w = $(window).width();
// var h = $(window).height();
// var scale = 1;

// function zoom(x) {
// if (x === -1) {
// scale = scale * 1.1;
// w = w * 0.9;
// h = h * 0.9;
// $("#iframe").width(w + "px");
// $("#iframe").height(h + "px")
// } else {
// scale = scale * 0.9;
// w = w * 1.1;
// h = h * 1.1;
// $("#iframe").width(w + "px");
// $("#iframe").height(h + "px")
// }

// $('#iframe').css('transform', `scale(${scale})`);
// } -->
<!-- </script> -->