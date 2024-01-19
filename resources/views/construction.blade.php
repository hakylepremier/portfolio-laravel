<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="Page Uner Contruction" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Humphrey Yeboah</title>
    <style>
        :root {
            --color-primary: #164863;
            --color-secondary: #ddf2fd;
            --color-tertiary: #427d9d;
            --color-quintenary: #9bbec8;
        }

        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        html {
            font-size: calc(100vw / 1440 * 16);
        }

        body {
            font-family: "Poppins", "Franklin Gothic Medium", "Arial Narrow", Arial,
                sans-serif;
            background-color: var(--color-secondary);
            height: 100%;
            height: 100vh;
            height: 100dvh;
            display: flex;
        }

        .main {
            max-width: 50rem;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 3.2rem;
        }

        .heading {
            font-size: 5rem;
            line-height: 0.8;
            color: var(--color-primary);
            margin: 0;
        }

        .paragraph {
            color: var(--color-tertiary);
        }

        .name {
            color: var(--color-primary);
            font-weight: 800;
            text-decoration: none;
        }

        .socials {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            grid-template-columns: auto auto;
            gap: 0.5rem;
        }

        .socials--list {
            position: relative;
        }

        .socials--link {
            display: inline-block;
            padding: 0.5rem;
            border-radius: 0.5rem;
            margin: 2px;
            background-color: var(--color-primary);
            color: var(--color-secondary);
            transition: color 0.5s, font-weight 0.2s;
        }

        .fa-brands,
        .fa-envelope {
            color: var(--color-secondary);
            padding-right: 0.5rem;
        }

        .socials--link:hover {
            background-color: var(--color-quintenary);
            color: var(--color-primary);
            font-weight: 800;
        }

        .socials--link:hover>.fa-brands,
        .socials--link:hover>.fa-envelope {
            color: var(--color-primary);
        }

        @media screen and (max-width: 600px) {
            html {
                font-size: 14px;
            }

            .heading {
                font-size: 4rem;
            }

            .socials {
                display: flex;
                flex-direction: column;
            }
        }

        @media screen and (max-width: 600px) {
            .heading {
                font-size: calc(100vw / 480 * 56);
            }
        }
    </style>
</head>

<body>
    <main class="main">
        <h1 class="heading">Site Under Construction</h1>
        <p class="paragraph">
            Hello, my name is <a href="#" class="name">Humphrey</a> and I'm a web and
            mobile app developer. I'm in the process of creating this website to
            showcase my amazing projects and to make it easy for you to reach out to
            me for your own project needs. The website is still under construction,
            but you can find me on social media through the links below.
        </p>
        <ul class="socials">
            <li class="socials--list">
                <a href="https://www.linkedin.com/in/humphrey-yeboah-9850881b3/" rel="noopener" target="_blank"
                    class="socials--link"><i class="fa-brands fa-linkedin"></i>Humphrey Yeboah</a>

            </li>
            <li class="socials--list">
                <a href="https://www.twitter.com/hakylepremier" rel="noopener" target="_blank" class="socials--link"><i
                        class="fa-brands fa-x-twitter"></i>@hakylepremier</a>

            </li>
            <li class="socials--list">
                <a href="https://github.com/hakylepremier" rel="noopener" target="_blank" class="socials--link"><i
                        class="fa-brands fa-github"></i>hakylepremier</a>

            </li>
            <li class="socials--list">
                <a href="https://facebook.com/humphrey.yeboah.5" rel="noopener" target="_blank" class="socials--link"><i
                        class="fa-brands fa-facebook"></i>Humphrey Yeboah</i></a>

            </li>
            <li class="socials--list">
                <a href="mailto: me@humphreyyeboah.com" rel="noopener" class="socials--link"><i
                        class="fa-solid fa-envelope"></i>me@humphreyyeboah.com</a>

            </li>
            <li class="socials--list">
                <a href="mailto: kwekuyeboah@outlook.com" rel="noopener" class="socials--link"><i
                        class="fa-solid fa-envelope"></i>kwekuyeboah@outlook.com</a>
            </li>
        </ul>
    </main>

    <script>
        const el = document.getElementsByTagName("html")
        const style = window.getComputedStyle(el[0], null).getPropertyValue("font-size")
        const fontSize = parseFloat(style)
        el[0].style.fontSize = fontSize + "px"
    </script>
</body>

</html>
