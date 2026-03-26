<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo contato - Aconsult</title>
</head>
<body style="margin:0; padding:0; background-color:#f8fafc; font-family:Arial, Helvetica, sans-serif; color:#1f2937;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8fafc; padding:24px 0;">
    <tr>
        <td align="center">
            <table role="presentation" width="640" cellpadding="0" cellspacing="0" style="max-width:640px; width:100%; background:#ffffff; border:1px solid #e5e7eb; border-radius:14px; overflow:hidden;">
                <tr>
                    <td style="background:#111827; padding:22px 26px;">
                        <p style="margin:0; font-size:12px; letter-spacing:1.4px; text-transform:uppercase; color:#fca5a5; font-weight:700;">Aconsult Contabilidade</p>
                        <h1 style="margin:8px 0 0; font-size:22px; line-height:1.3; color:#ffffff; font-weight:800;">Novo contato recebido pelo site</h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px 26px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                            <tr>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; width:170px; color:#6b7280; font-size:13px; font-weight:700;">Nome</td>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; font-size:14px; color:#111827;">{{ $nome }}</td>
                            </tr>
                            <tr>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; color:#6b7280; font-size:13px; font-weight:700;">E-mail</td>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; font-size:14px;"><a href="mailto:{{ $email }}" style="color:#e21850; text-decoration:none;">{{ $email }}</a></td>
                            </tr>
                            <tr>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; color:#6b7280; font-size:13px; font-weight:700;">WhatsApp</td>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; font-size:14px; color:#111827;">{{ $whatsapp }}</td>
                            </tr>
                            <tr>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; color:#6b7280; font-size:13px; font-weight:700;">Empresa</td>
                                <td style="padding:11px 0; border-bottom:1px solid #f1f5f9; font-size:14px; color:#111827;">{{ $empresa !== '' ? $empresa : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="padding:11px 0; color:#6b7280; font-size:13px; font-weight:700;">Assunto</td>
                                <td style="padding:11px 0; font-size:14px; color:#111827;">{{ $assunto }}</td>
                            </tr>
                        </table>

                        <div style="margin-top:18px; border:1px solid #f3f4f6; background:#fafafa; border-radius:10px; padding:16px;">
                            <p style="margin:0 0 8px; font-size:12px; color:#6b7280; font-weight:700; letter-spacing:0.3px; text-transform:uppercase;">Mensagem</p>
                            <p style="margin:0; font-size:14px; line-height:1.75; color:#111827; white-space:pre-line;">{{ $mensagemConteudo }}</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:14px 26px; background:#f9fafb; border-top:1px solid #f1f5f9;">
                        <p style="margin:0; font-size:12px; color:#9ca3af;">E-mail automático enviado pelo formulário de Contato do site.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
