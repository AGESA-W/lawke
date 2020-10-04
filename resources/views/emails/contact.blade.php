{{-- <h4 class="text-center py-2 px-3" style="background:#f4f4f4">LEGALMEET</h4>
<p class="lead">{{$description}}</p> --}}


{{-- <style>
    @media  only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media  only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
</style> --}}

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style=" background-color: #f8fafc; margin: 0; padding: 0; width: 100%;">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style=" padding: 0; width: 100%;">
                <tr>
                    <td class="header" style="padding: 25px 0; text-align: center;">
                        <a href="http://localhost" style="box-sizing: border-box; color: #bbbfc3; font-size: 19px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;">
                            LEGALMEET
                        </a>
                    </td>
              </tr>

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style=" background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style=" background-color: #ffffff; margin: 0 auto; padding: 0; width: 570px;">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell" style="box-sizing: border-box; padding: 35px;">
                                  
                                    <p><b>{{$subject}}</b></p>
                                     <p style="color: #3d4852; font-size: 16px; line-height: 1.5em;text-align: left;">{{$bodydescription}}</p>     
                                    <span>Regards,</span> 
                                    <br> 
                                    <span>{{$email}}.</span>                    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style=" margin: 0 auto; padding: 0; text-align: center;">
                            <tr>
                                <td class="content-cell" align="center" style="padding: 35px;">
                                    <p style="line-height: 1.5em; margin-top: 0; color: #aeaeae; font-size: 12px; text-align: center;">© 2020 LEGALMEET. All rights reserved.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>