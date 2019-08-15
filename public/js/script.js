$(function() {


    // ketika tombol edit di klik maka jalankan fungsi diawah
    $('.tombolTambahData').on('click', function(){

        // mengubah form ModalLabel
        $('#formModalLabel').html('Tambah Data Wargaku');


        // mengubah button dengan css selector
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/warga_sekitar/public/wargaku/tambah');
        $('#nama').val('');
        $('#asal').val('');
        $('#asal').val('');

    });

    // ketika tombol edit di klik maka jalankan fungsi diawah
    $('.edit').on('click', function(){
        

        // mengubah form modalLAbel
        $('#formModalLabel').html('Edit Data Wargaku');

        //mengubah form button tambahData dengan css selector
        $('.modal-footer button[type=submit]').html('Edit Data');

        // pindahin action
        $('.modal-body form').attr('action', 'http://localhost/warga_sekitar/public/wargaku/edit');

        // mengambil data berdasarkan id
        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/warga_sekitar/public/wargaku/getedit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                 $('#nama').val(data.nama);
                 $('#asal').val(data.asal);
                 $('#id').val(data.id);
            }
        });


    });

});