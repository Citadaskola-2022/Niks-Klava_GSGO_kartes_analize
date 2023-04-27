<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
            rel="stylesheet"/>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          fontFamily: {
            sans: ["Roboto", "sans-serif"],
            body: ["Roboto", "sans-serif"],
            mono: ["ui-monospace", "monospace"],
          },
        },
        corePlugins: {
          preflight: false,
        },
      };
    </script>
</head>

<body class="dark:bg-neutral-800">
<nav
        class="relative flex w-full flex-nowrap items-center justify-between bg-neutral-100 py-4 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 lg:flex-wrap lg:justify-start"
        data-te-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between px-6">
        <button
                class="block border-0 bg-transparent py-2 px-2.5 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 lg:hidden"
                type="button"
                data-te-collapse-init
                data-te-target="#navbarSupportedContent3"
                aria-controls="navbarSupportedContent3"
                aria-expanded="false"
                aria-label="Toggle navigation">
      <span class="[&>svg]:w-7">
        <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="h-7 w-7">
          <path
                  fill-rule="evenodd"
                  d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                  clip-rule="evenodd"/>
        </svg>
      </span>
        </button>
        <div
                class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
                id="navbarSupportedContent3"
                data-te-collapse-item>
            <a class="text-xl text-black" href="#">CS GO Map Analyzer</a>
            <!-- Left links -->
            <ul
                    class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
                    data-te-navbar-nav-ref>
                <?php if (!\App\User::currentUser()):?>
                <li class="lg:px-2" data-te-nav-item-ref>
                    <a
                            class="active disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            aria-current="page"
                            href="/"
                            data-te-nav-link-ref
                    >Home</a>
                </li>
                <?php endif; ?>
                <?php if (\App\User::currentUser()):?>
                <li class="lg:pr-2" data-te-nav-item-ref>
                    <a
                            class="p-0 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="/form"
                            data-te-nav-link-ref
                    >Form</a>
                </li>
                <li class="lg:pr-2" data-te-nav-item-ref>
                    <a
                            class="p-0 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="/my-stats"
                            data-te-nav-link-ref
                    >My Stats</a>
                </li>
                <li class="lg:pr-2" data-te-nav-item-ref>
                    <a
                            class="p-0 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="/logout"
                            data-te-nav-link-ref
                    >Logout</a>
                </li>
                <?php endif; ?>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
</nav>

<div class="mx-96">
