<?php
/*
 * $Header: /cvsroot/nocc/nocc/webmail/check_lang.php,v 1.19 2002/01/20 22:15:46 rossigee Exp $
 *
 * Copyright 2001 Nicolas Chalanset <nicocha@free.fr>
 * Copyright 2001 Olivier Cahagne <cahagn_o@epita.fr>
 *
 * See the enclosed file COPYING for license information (GPL).  If you
 * did not receive this file, see http://www.fsf.org/copyleft/gpl.html.
 *
 * Sends HTTP headers to forbid transparent proxies, HTTP/1.x proxies to
 * to cache answers from the server running NOCC.
 * This is quite aggressive, we could have set Cache-control to private
 * to forbid only proxy to cache answers but this would allow browser
 * to be able to cache answers; given that some people use NOCC from
 * a public computer, Cache-control is set to no-cache to prevent any
 * caching. This might lower NOCC speed but it's hard to be both secure
 * and cache-friendly when dealing with dynamic content.
 */

header ("Pragma: no-cache");
header ("Cache-control: no-cache");
?>
