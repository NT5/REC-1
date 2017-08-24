$(function () {
    $(".input-field").delegate('input[type=number]', 'change', function () {
        var container = $(this);
        var valor = parseInt(container.val());
        if (valor) {
            container.val(Math.abs(valor));
        }
    });

    $('.btn-autofill.autofill-carreras').on('click', function () {
        var controlForm = $('table#table-data tbody'),
                currentEntry = controlForm.find('tr:first');

        $('table#table-data .input-field select[name="carrera_id[]"] option:eq(0)').prop('selected', true);

        var carreras = $('table#table-data .input-field select[name="carrera_id[]"] option:not(:first)');
        carreras.each(function () {
            var value_car = $(this).val(),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('select[name="carrera_id[]"]')
                    .val(value_car);
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
        var controlForm = $('table#table-data tbody'),
                firstEntry = controlForm.find('tr:first');

        var turnos = (function () {
            var itmm = [];
            firstEntry.find('.input-field select[name="turno_id[]"] option').each(function () {
                itmm.push({
                    'name': $(this).text(),
                    'val': $(this).val()
                });
            });
            return itmm;
        })();

        console.log(turnos);

        controlForm.find('tr').each(function () {
            var currentEntryTable = $(this);
            currentEntryTable.find('.input-field select[name="turno_id[]"] option:not(:first)').each(function () {
                var newEntry = currentEntryTable.after(currentEntryTable.clone());

                console.log(newEntry);
            });
        });

        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');
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