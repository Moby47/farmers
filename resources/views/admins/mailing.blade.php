<!DOCTYPE html PUBLIC " -//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">body, html {
      width: 100% !important;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: none;
      -ms-text-size-adjust: 100%;
    }
      table td, table {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }
      #outlook a {
        padding: 0;
      }
      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
        line-height: 100%;
      }
      .ExternalClass {
        width: 100%;
      }
      @media only screen and (max-width: 480px) {
        table, table tr td, table td {
          width: 100% !important;
        }
        img {
          width: inherit;
        }
        .layer_2 {
          max-width: 100% !important;
        }
      }
    </style>
  </head>
  <body style="padding:0; margin: 0;">
    <table style="height: 100%; width: 100%; background-color: #e1e9f3;" align="center">
      <tbody>
        <tr>
          <td valign="top" id="dbody" data-version="2.30" style="width: 100%; height: 100%; padding-top: 30px; padding-bottom: 30px; background-color: #e1e9f3;">
            <!--[if (gte mso 9)|(IE)]><table align="center" style="max-width:600px" width="600" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
            <table class="layer_1" align="center" border="0" cellpadding="0" cellspacing="0" style="max-width: 600px; box-sizing: border-box; width: 100%; margin: 0px auto;">
              <tbody>
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color: #e1e9f3; box-sizing: border-box; font-size: 0px; text-align: center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                      <table border="0" cellspacing="0" cellpadding="0" class="edcontent" style="border-collapse: collapse;width:100%">
                        <tbody>
                          <tr>
 <td valign="top" class="edimg" style="padding: 20px; box-sizing: border-box; text-align: center;">
    <img src="https://www.dstreet.com.ng/images/dstreet-logo.png" alt="Image" width="149" style="border-width: 0px; border-style: none; max-width: 149px; width: 100%;">
                            </td>
                          </tr>
                          <tr>
                                <td valign="top" class="edtext" style=" padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                  <p style="margin: 0px; padding: 0px;">
                     <b style='text-decoration:underline;'> Checkout Items on Dstreet</b>
                                                              </p>
                                                            </td>
                                                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="display: inline-block; vertical-align: top; width: 100%; max-width: 600px;">
                     
  @foreach($post as $p)
                        <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                        <tbody>

                          <tr>
   <td valign="top" class="edimg" style="text-align: center; padding: 20px; box-sizing: border-box;">
   <img src="/storage/post_images/{{$p->image_1}}" 
  alt="Image" width="220" height="200" style="border-width: 0px; border-style: none; max-width: 220px; width: 100%;">
                            </td>
                          </tr>
                          <tr>
   <td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, 
   sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box; text-align: center;">
     <p style="margin: 0px; padding: 0px;">
            {{$p->title}}  <br>  <i><strike>N</strike>{{number_format($p->price)}}  | {{substr($p->school,0,32) }}</i>
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td valign="top" class="edbutton" style="padding: 20px;">
                              <table cellspacing="0" cellpadding="0" style="text-align: center;margin:0 auto;" align="center">
                                <tbody>
                                  <tr>
   <td align="center" style="border-radius: 4px; padding: 12px; background: #035096;">
   <a style="color: #ffffff; font-size: 16px; font-family: Helvetica, 
   Arial, sans-serif; font-weight: normal; text-decoration: none; display: inline-block;"
    href='https://www.dstreet.com.ng/buy-product/{{$p->id}}'>
   <span style="color: #ffffff;" >View</span></a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                      </tbody>
                      </table>

@endforeach
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="display: inline-block; vertical-align: top; width: 100%; max-width: 600px;">
                      <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                        <tbody>
                          <tr>
                            <td valign="top" class="edbutton" style="padding: 20px;">
                              <table cellspacing="0" cellpadding="0" style="text-align: center;margin:0 auto;" align="center">
                                <tbody>
                                  <tr>
  <td align="center" style="border-radius: 4px; padding: 12px; background: #035096;">
   <a style="color: #ffffff; font-size: 16px; font-family:
    Helvetica, Arial, sans-serif; font-weight: normal; text-decoration: none; display: inline-block;" 
    href='{{route('center')}}'>
    <span style="color: #ffffff;">Enter DStreet</span></a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>
                <tr>
                  <td class="drow" valign="top" align="center" style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
                    <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
                    <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                      <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
                        <tbody>
                          <tr>
<td valign="top" class="edtext" style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
  <p style="margin: 0px; padding: 0px; text-align: center; color:red;">
      <b>  Advertise for FREE specifically to Students in your School and other Nigerian Universities plus the general public. Dhustle just got easier!</b>
                              </p>
                            </td>
                          </tr>
                          <td valign="top" class="edtext" style=" padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                <p style="margin: 0px; padding: 0px;">
                   <b style='text-decoration:underline; '> Other Features on DStreet</b>
                                                            </p>
                                                          </td>

 <tr>

 <td valign="top" class="edtext" style=" padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
  <p style="margin: 0px; padding: 0px;">
    - <b style=' '> <a href='https://www.dstreet.com.ng/final-year-projects' >Offer assistance to final year students (Any Project)</a></b>
      </p>
      <br>
      <p style="margin: 0px; padding: 0px;">
           - <b style=' '><a href='https://www.dstreet.com.ng/final-year-projects' > Find help for your final  Project</a></b>
              </p>
              <br>
      <p style="margin: 0px; padding: 0px;">
           - <b style=' '><a href='https://www.dstreet.com.ng/view-requests'> Request for an item and get contacted with help</a></b>
              </p>
   </td>


 </tr>
    
                        </tbody>
                      </table>
                      <table align="center" border="0" cellpadding="0" cellspacing="0" data-service="facebook">
                            <tbody>
                              <tr>
                                <td align="center" valign="middle" style="padding:10px;">
                                  <a href="https://fb.me/Dstreet.LIVE" target="_blank" style="color:#3498db;font-size:12px;font-family:Helvetica,Arial,sans-serif">Facebook</a></td>
                              </tr>
                            </tbody>
                          </table>
                          <table align="center" border="0" cellpadding="0" cellspacing="0" data-service="facebook">
                                <tbody>
                                  <tr>
                                    <td align="center" valign="middle" style="padding:10px;">
                                      <a href="https://www.instagram.com/_dstreetlive" target="_blank" style="color:#3498db;font-size:12px;font-family:Helvetica,Arial,sans-serif">Instagram</a></td>
                                  </tr>
                                </tbody>
                              </table>
                          <table align="center" border="0" cellpadding="0" cellspacing="0" data-service="facebook">
                                <tbody>
                                  <tr>
                                        <td align="center" valign="middle" style="padding:10px;">
                                                <a href="mailto:info2dstreet@gmail.com" target="_blank" style="color:#3498db;font-size:12px;font-family:Helvetica,Arial,sans-serif">info2dstreet@gmail.com</a></td>
                                             </tr>
                                </tbody>
                              </table>
                              <table align="center" border="0" cellpadding="0" cellspacing="0" data-service="facebook">
                                    <tbody>
                                      <tr>
                                            <td align="center" valign="middle" style="padding:10px;">
        <a href="tel:+2348035562231" target="_blank" style="color:#3498db;font-size:12px;font-family:Helvetica,Arial,sans-serif">+2348122760601</a></td>
                                                 </tr>
                                    </tbody>
                                  </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
