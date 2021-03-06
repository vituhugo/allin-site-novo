<!DOCTYPE>
<html>
<head>
    @include('_layouts._partials.head_tags')
    <title>All iN Marketing Cloud | E-mail Marketing e Remarketing</title>
</head>
<body id="body">

<style>
    .screen-block {
        position: fixed;
        z-index: 9999;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: white;
    }
    .fade {
        opacity: 0;
    }
</style>
<div class="screen-block"></div>
@include('_layouts._partials.header-old')
{{--@include('_layouts._partials.header')--}}
@yield('content')
@include('_layouts._partials.footer')
<section id="external-scripts">
    <!-- v1.0.4 -->

    <link rel="stylesheet" href="{{ $page->baseUrl }}/assets/build/css/main.css">
    <script src="{{ $page->baseUrl }}/assets/build/js/main.js"></script>

    @yield('scripts')

    <script>
        var google_conversion_id = 993006705;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /*  */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993006705/?value=0&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4037989.js"></script>
    <!-- End of HubSpot Embed Code -->

    <script src="//i.btg360.com.br/wf.js" type="text/javascript"></script> <!-- Integração TAG envio de contato allin -->
    <script>
        $(document).ready(function() {

            $('#form-contato').submit(function(event) {
                event.preventDefault();
                var email = jQuery("input[name='email']").val();
                var subject = $("#ddl-assunto").val();
                if (navigator.sendBeacon) ga('set', 'transport', 'beacon');

                ga('send', 'event', 'enviar_mensagem', subject, email);

                $.post(this.action, $(this).serialize(), function(response) {
                    alert(response.mensagem || "Sua solicitação não pode ser completada.");

                    __blc['id'] = "ff703a43d4ffa579f2cadb456b7ad142";
                    try {
                        lc.sendData({
                            evento: "Novo Cadastro",
                            nm_email: email,
                            vars: {},
                            lista: {}
                        });
                    } catch (e) {}

                }).fail(function() {
                    alert("Sua solicitação não pode ser completada.");
                });


            });

            $('.sml_subscribe').submit(function(event) {
                event.preventDefault();

                $.post(this.action, $(this).serialize(), function(response) {
                    alert(response.mensagem || "Sua solicitação não pode ser completada.");
                });

                return false;
            });
        })
    </script>
</section>
</body>
</html>