$(function () {

    var frm_validations = {
        // No numeros negativos
        number_input: function (selector) {
            selector.change(function () {
                var container = $(this);
                var valor = container.val();
                if (!isNaN(valor) && (valor = parseInt(valor))) {
                    container.val(Math.abs(valor));
                } else {
                    container.val(0);
                }
            });
        },
        // Calculos
        number_maths: function (entry) {
            var varones_rurales = entry.find('input[type=number][name="varones_rurales[]"]'),
                    varones_urbanos = entry.find('input[type=number][name="varones_urbanos[]"]'),
                    mf_v = entry.find('input#MF-V[type=number]'),
                    nvr = entry.find('input#NVR[type=number]'),
                    per_repv = entry.find('input#per_rep-v[type=number]'),
                    mujeres_rurales = entry.find('input[type=number][name="mujeres_rurales[]"]'),
                    mujeres_urbanos = entry.find('input[type=number][name="mujeres_urbanos[]"]'),
                    mf_m = entry.find('input#MF-M[type=number]'),
                    nmr = entry.find('input#NMR[type=number]'),
                    per_repm = entry.find('input#per_rep-m[type=number]'),
                    toast_duration = 1000;

            $(varones_rurales)
                    .add($(varones_urbanos))
                    .change(function () {
                        $(mf_v).val(parseInt($(varones_urbanos).val()) + parseInt($(varones_rurales).val()))
                                .trigger('change');

                        Materialize.toast('Matricula final de varones: ' + $(mf_v).val(), toast_duration);
                    });

            $(nvr)
                    .add($(mf_v))
                    .change(function () {
                        var calc = parseInt($(nvr).val()) / parseInt($(mf_v).val());
                        $(per_repv).val(Math.floor(calc * 100));
                        Materialize.toast('% Rendimiento de varones: ' + $(per_repv).val(), toast_duration);
                    });

            $(mujeres_rurales)
                    .add($(mujeres_urbanos))
                    .change(function () {
                        $(mf_m).val(parseInt($(mujeres_rurales).val()) + parseInt($(mujeres_urbanos).val()))
                                .trigger('change');

                        Materialize.toast('Matricula final de mujeres: ' + $(mf_m).val(), toast_duration);
                    });

            $(nmr)
                    .add($(mf_m))
                    .change(function () {
                        var calc = parseInt($(nmr).val()) / parseInt($(mf_m).val());
                        $(per_repm).val(Math.floor(calc * 100));
                        Materialize.toast('% Rendimiento de mujeres: ' + $(per_repm).val(), toast_duration);
                    });
        }
    };
    frm_validations.number_input($('.input-field input[type=number]'));
    frm_validations.number_maths($('table#table-data tbody td'));

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

                newEntry.find('input[type=number]')
                        .removeClass('valid')
                        .val(0);

                frm_validations.number_input(newEntry.find('.input-field input[type=number]'));
                frm_validations.number_maths(newEntry);
            });
        });
        Materialize.toast('¡Carreras añadidas!', 4000, 'rounded');

        $(controlForm).find('select').material_select();
        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');
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

                newEntry.find('input[type=number]')
                        .removeClass('valid')
                        .val(0);

                frm_validations.number_input(newEntry.find('.input-field input[type=number]'));
                frm_validations.number_maths(newEntry);
            });
        });
        Materialize.toast('¡Turnos añadidas!', 4000, 'rounded');

        $(controlForm).find('select').material_select();
        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');
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

                newEntry.find('input[type=number]')
                        .removeClass('valid')
                        .val(0);

                frm_validations.number_input(newEntry.find('.input-field input[type=number]'));
                frm_validations.number_maths(newEntry);
            });
        });
        Materialize.toast('¡Años de carrera añadidas!', 4000, 'rounded');

        $(controlForm).find('select').material_select();
        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');
    });

    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();
        var controlForm = $(this).closest('table'),
                currentEntry = $(this).parents('tr:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input[type=number]')
                .removeClass('valid')
                .val(0);

        frm_validations.number_input(newEntry.find('.input-field input[type=number]'));
        frm_validations.number_maths(newEntry);

        var selects = currentEntry.find('select');
        $(selects).each(function (i) {
            var select = this;
            $(newEntry).find("select").eq(i).val($(select).val());
        });

        $(newEntry).add($(currentEntry))
                .find('select').material_select();

        controlForm.find('tr:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .text('remove');

        Materialize.toast('¡Entrada añadida!', 500);
    }).on('click', '.btn-remove', function (e) {
        // $(this).parents('tr:first').remove();
        $(this).closest('tr')
                .children('td')
                .animate({padding: 0})
                .wrapInner('<div />')
                .children()
                .slideUp(function () {
                    $(this).closest('tr').remove();
                });

        Materialize.toast('¡Entrada borrada!', 500);
        e.preventDefault();
        return false;
    });
});