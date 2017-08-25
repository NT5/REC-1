$(function () {
    $(".input-field").delegate('input[type=number]', 'change', function () {
        var container = $(this);
        var valor = parseInt(container.val());
        if (valor) {
            container.val(Math.abs(valor));
        }
    });

    $('.btn-autofill.autofill-clear').on('click', function () {
        var controlForm = $('table#table-data tbody');

        controlForm.find('tr:not(:first)').each(function () {
            $(this).remove();
        });
        Materialize.toast('¡Formulario limpiado!', 4000, 'rounded');

        controlForm.find('tr:first .btn-remove')
                .removeClass('btn-remove').addClass('btn-add')
                .text('add');
    });

    $('.btn-autofill.autofill-carreras').on('click', function () {
        var controlForm = $('table#table-data tbody');

        controlForm.find('tr').each(function () {
            var currentEntry = $(this);

            currentEntry
                    .find('select[name="carrera_id[]"] option:eq(0)')
                    .prop('selected', true);

            currentEntry.find('.input-field select[name="carrera_id[]"] option:not(:first)').reverse().each(function () {
                currentEntry.after(currentEntry.clone());

                var newEntry = $(currentEntry).next(),
                        value_itm = $(this).val();

                newEntry.find('select[name="turno_id[]"]')
                        .val($(currentEntry).find('select[name="turno_id[]"]').val());
                newEntry.find('select[name="anio_carrera[]"]')
                        .val($(currentEntry).find('select[name="anio_carrera[]"]').val());

                newEntry.find('select[name="carrera_id[]"]')
                        .val(value_itm);
            });
        });
        Materialize.toast('¡Carreras añadidas!', 4000, 'rounded');

        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');

        controlForm.find('.input-field input[type=number]').change(function () {
            var container = $(this);
            var valor = parseInt(container.val());
            if (valor) {
                container.val(Math.abs(valor));
            }
        });
    });

    $('.btn-autofill.autofill-turnos').on('click', function () {
        var controlForm = $('table#table-data tbody');

        controlForm.find('tr').each(function () {
            var currentEntry = $(this);

            currentEntry
                    .find('select[name="turno_id[]"] option:eq(0)')
                    .prop('selected', true);

            currentEntry.find('.input-field select[name="turno_id[]"] option:not(:first)').reverse().each(function () {
                currentEntry.after(currentEntry.clone());

                var newEntry = $(currentEntry).next(),
                        value_itm = $(this).val();

                newEntry.find('select[name="carrera_id[]"]')
                        .val($(currentEntry).find('select[name="carrera_id[]"]').val());
                newEntry.find('select[name="anio_carrera[]"]')
                        .val($(currentEntry).find('select[name="anio_carrera[]"]').val());

                newEntry.find('select[name="turno_id[]"]')
                        .val(value_itm);
            });
        });
        Materialize.toast('¡Turnos añadidas!', 4000, 'rounded');

        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');

        controlForm.find('.input-field input[type=number]').change(function () {
            var container = $(this);
            var valor = parseInt(container.val());
            if (valor) {
                container.val(Math.abs(valor));
            }
        });
    });

    $('.btn-autofill.autofill-anio_carrera').on('click', function () {
        var controlForm = $('table#table-data tbody');

        controlForm.find('tr').each(function () {
            var currentEntry = $(this);

            currentEntry
                    .find('select[name="anio_carrera[]"] option:eq(0)')
                    .prop('selected', true);

            currentEntry.find('.input-field select[name="anio_carrera[]"] option:not(:first)').reverse().each(function () {
                currentEntry.after(currentEntry.clone());

                var newEntry = $(currentEntry).next(),
                        value_itm = $(this).val();

                newEntry.find('select[name="carrera_id[]"]')
                        .val($(currentEntry).find('select[name="carrera_id[]"]').val());
                newEntry.find('select[name="turno_id[]"]')
                        .val($(currentEntry).find('select[name="turno_id[]"]').val());

                newEntry.find('select[name="anio_carrera[]"]')
                        .val(value_itm);
            });
        });
        Materialize.toast('¡Años de carrera añadidas!', 4000, 'rounded');

        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');

        controlForm.find('.input-field input[type=number]').change(function () {
            var container = $(this);
            var valor = parseInt(container.val());
            if (valor) {
                container.val(Math.abs(valor));
            }
        });
    });

    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();
        var controlForm = $(this).closest('table'),
                currentEntry = $(this).parents('tr:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('.input-field input[type=number]').change(function () {
            var container = $(this);
            var valor = parseInt(container.val());
            if (valor) {
                container.val(Math.abs(valor));
            }
        });

        var selects = currentEntry.find('select');
        $(selects).each(function (i) {
            var select = this;
            $(newEntry).find("select").eq(i).val($(select).val());
        });

        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');

        Materialize.toast('¡Entrada añadida!', 500);
    }).on('click', '.btn-remove', function (e) {
        $(this).parents('tr:first').remove();
        Materialize.toast('¡Entrada borrada!', 500);

        e.preventDefault();
        return false;
    });
});