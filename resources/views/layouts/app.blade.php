<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Admin | Dashboard </title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min2167.css?v=3.2.0') }}">
    <script nonce="d5065b0a-7b2f-4953-a0bf-0fcb14606a2f">
        try {
            (function(w, d) {
                ! function(j, k, l, m) {
                    j[l] = j[l] || {};
                    j[l].executed = [];
                    j.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    j.zaraz._v = "5621";
                    j.zaraz.q = [];
                    j.zaraz._f = function(n) {
                        return async function() {
                            var o = Array.prototype.slice.call(arguments);
                            j.zaraz.q.push({
                                m: n,
                                a: o
                            })
                        }
                    };
                    for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                    j.zaraz.init = () => {
                        var q = k.getElementsByTagName(m)[0],
                            r = k.createElement(m),
                            s = k.getElementsByTagName("title")[0];
                        s && (j[l].t = k.getElementsByTagName("title")[0].text);
                        j[l].x = Math.random();
                        j[l].w = j.screen.width;
                        j[l].h = j.screen.height;
                        j[l].j = j.innerHeight;
                        j[l].e = j.innerWidth;
                        j[l].l = j.location.href;
                        j[l].r = k.referrer;
                        j[l].k = j.screen.colorDepth;
                        j[l].n = k.characterSet;
                        j[l].o = (new Date).getTimezoneOffset();
                        if (j.dataLayer)
                            for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                    ...x[1],
                                    ...y[1]
                                })), {}))) zaraz.set(w[0], w[1], {
                                scope: "page"
                            });
                        j[l].q = [];
                        for (; j.zaraz.q.length;) {
                            const z = j.zaraz.q.shift();
                            j[l].q.push(z)
                        }
                        r.defer = !0;
                        for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                            .startsWith("_zaraz_"))).forEach((B => {
                            try {
                                j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                            } catch {
                                j[l]["z_" + B.slice(7)] = A.getItem(B)
                            }
                        }));
                        r.referrerPolicy = "origin";
                        r.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                        q.parentNode.insertBefore(r, q)
                    };
                    ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>

    <style type = "text/css">
    .flashMessage{
         display:none;
         position: fixed;
         top:20px;
         right:20px;
         z-index: 1050;
         min-width: 250px;
    }
    
.flash-message {
    position:fixed !important;
    top:20px;
    right:-400px;
    min-width: 280px;
    padding:15px 20px;
    border-radius: 5px;
    color:#fff;
    z-index:9999;
    opacity:1 !important;
    transition:all 0.5s ease;
}

.flash-message.show{
    right:20px;
    opacity:1;
}

.flash-success {
    background: #28a745;
}

.flash-error {
    background: #dc3545;
}


    </style>

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

     <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('dist/img/8306.jpg') }}" alt="AdminLTE Logo"
                height="60" width="60">
        </div>



       @include('layouts._header')

       @include('layouts._siedbar')

       


             @yield('contenet')



       @include('layouts._footer')

        
      
    </div>

    @yield('script')

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js"></script>

    <script src="{{ asset('dist/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte2167.js?v=3.2.0') }}"></script>


    <script src="{{ asset('dist/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('dist/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>

    <script src="{{ asset('dist/plugins/chart.js/Chart.min.js') }}"></script>

    

    <script src="{{ asset('dist/js/demo.js') }}"></script>

    <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>

    
    <script>

       @yield('script')

    </script>

</body>

<!-- Mirrored from adminlte.io/themes/v3/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:33 GMT -->

</html>
