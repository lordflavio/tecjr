<div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;">
    <table style="width: 100%;">
        <tr>
            <td></td>
            <td bgcolor="#FFFFFF ">
                <div style="padding: 15px; max-width: 600px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px; border: 1px solid lightseagreen;">
                    <table style="width: 100%;background: #fff ;">
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <table width="100%">
                                        <tr>
                                            <td rowspan="2" style="text-align:center;padding:10px;">
                                                <img style="float:left; "  src="{{'http://laravel-lordflavioo.c9users.io/public/imagens/logo1.png'}}" width="150" />

                                                <span style="color:#000;float:right;font-size: 13px;font-style: italic;margin-top: 20px; padding:10px; font-weight:normal;">
							Mensagem do Site <span></span></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </table>

                    <table style="padding: 10px;font-size:14px; width:100%;">
                        <tr>
                            <td style="padding:10px;font-size:14px; width:100%;">
                                <p><b>Enviado Por:</b> {{$dados->nome}}</p>
                                <p><b>Email: {{$dados->email}} </p>
                                <p><br /> <b>Assunto:</b> {{$dados->assunto}} </p>
                                <p><b>Mensagem</b><br /></p>
                                <p>{{$dados->mensage}}</p>
                                {{--<p>Thanks for choosing SeeDocOnline,</p>--}}
                                {{--<p>SeeDocOnline Team.</p>--}}
                                <!-- /Callout Panel -->
                                <!-- FOOTER -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;">
                                    © 2017 <a href="http://www.tecjr.com.br" target="_blank" style="color:#333; text-decoration: none;">www.tecjr.com.br</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>