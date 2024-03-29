<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Sidebar Nav</a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarCollapse"
        aria-controls="navbarCollapse"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto sidenav" id="navAccordion">
            <li class="nav-item ">
                <a class="nav-link "  aria-expanded="false" onclick="loadview('dashboard')">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" onclick="loadview('user')">User<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Item 1</a>
            </li>
            <li class="nav-item not">
                <a
                    class="nav-link nav-link-collapse"
                    href="#"
                    id="hasSubItems"
                    data-toggle="collapse"
                    data-target="#collapseSubItems2"
                    aria-controls="collapseSubItems2"
                    aria-expanded="false"
                >Item 2</a>
                <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#navAccordion">
                    <li class="nav-item second">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Item 2.1</span>
                        </a>
                    </li>
                    <li class="nav-item second">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Item 2.2</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Item 3</a>
            </li>
            <li class="nav-item not">
                <a
                    class="nav-link nav-link-collapse"
                    href="#"
                    id="hasSubItems"
                    data-toggle="collapse"
                    data-target="#collapseSubItems4"
                    aria-controls="collapseSubItems4"
                    aria-expanded="false"
                >Item 4</a>
                <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#navAccordion">
                    <li class="nav-item second">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Item 4.1</span>
                        </a>
                    </li>
                    <li class="nav-item second">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Item 4.2</span>
                        </a>
                    </li>
                    <li class="nav-item second">
                        <a class="nav-link" href="#">
                            <span class="nav-link-text">Item 4.2</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Item 5</a>
            </li>
        </ul>
        <form class="form-inline ml-auto mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <a class="btn btn-danger ml-2" href="<?php echo base_url() ?>login/logout">Logout</a>
    </div>
</nav>