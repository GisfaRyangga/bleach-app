<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Choose Your Fighter!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-self-sm-center" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Ichigo") ? 'active' : '' }}"
                    href="/ichigo">Kurosaki Ichigo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Aizen") ? 'active' : '' }}"
                    href="/aizen">Sōsuke Aizen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Yamamoto") ? 'active' : '' }}"
                    href="/yamamoto">Genryūsai Yamamoto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Yhwach") ? 'active' : '' }}"
                    href="/yhwach">Yhwach</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Shunsui") ? 'active' : '' }}"
                    href="/shunsui">Shunsui Kyōraku</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
