<head>
<link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
</head>
<div class="profile">
    <div class="dropdown-container">
        <details class="dropdown left">
            <summary class="p">
                <span class="material-symbols-outlined pIcon">person</span>
                {{Auth::user()->first_name. ' '.Auth::user()->last_name}}
                <span class="material-symbols-outlined">arrow_drop_down</span>
            </summary>
            <ul>
                <li>
                    <p class="p">
                        <span class="block bold">{{Auth::user()->first_name. ' '.Auth::user()->last_name}}</span>
                        <span class="block italic">{{Auth::user()->email}}</span>
                    </p>
                </li>
                <li>
                    <span class="material-symbols-outlined">account_circle</span> Profile
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <form id="logout" onclick="redirect()" action="logout" method="POST">
                        @csrf
                        <span class="material-symbols-outlined">logout</span>Logout
                    </form>
                </li>
            </ul>
        </details>
    </div>
</div>

<div class="sidebar">
    <div class="top">
        <h1>Tinatangi</h1>
    </div>

    <!-- <form action="logout" method="POST">
        @csrf
        <input type="submit" value="logout">
    </form> -->

    <div class="bar">
        <ul>
            <li>
                <a class="@yield('dashboard')" href="{{route('admin')}}"> <span class="material-symbols-outlined">dashboard</span> Dashboard</a>
            </li>
            <li>
                <a class="@yield('stocks')" href=""> <span class="material-symbols-outlined">inventory</span> Stocks</a>
            </li>
            <li>
                <a class="@yield('add')" href=""> <span class="material-symbols-outlined">add</span> Add Product</a>
            </li>
            <li>
                <a class="@yield('users')" href=""> <span class="material-symbols-outlined">person</span> Users</a>
            </li>
        </ul>

    </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
    function redirect() {
        $("#logout").submit();
    }
</script>

<style>
    
.sidebar {
    font-family: 'Hurricane', sans-serif;
    left: 0;
    z-index: 0;
    position: fixed;
    color: var(--text_white);
    padding: 0 50px 50px 50px;
    background-color: var(--accent-choco-light);
    display: flex;
    flex-direction: column;
    height: 100vh;
    width: 300px;
}

.bar {
    margin-top: 50px;
    display: flex;
}
.bar ul {
    list-style-type: none;
}
.bar ul li {
    margin-bottom: 30px;
}
.bar ul li a {
    font-size: 18px;
}
.bar ul li a span {
    font-size: 30px;
    transform: translate(0, 25%);
}
.bar .active {
    color: var(--accent-milo);
}

.top {
    margin-top: 30px;
    justify-items: center;
    align-items: center;
}
.top h1 {
    font-family: "Hurricane", cursive;
    font-size: 80px;
}
.profile {
    text-align: end;
    justify-items: end;
    padding: 20px 200px 0 0;
}

    /* 
-----------------
Dropdown Styles 
-----------------
*/

    .pIcon {
        font-size: 26px;
        font-weight: bolder;
        transform: translate(0, 18%);
        cursor: pointer;
        color: var(--black);

        :hover {
            color: var(--orange);
        }
    }

    .dropdown-container {
        display: inline-block;
        padding: 10px 0;
        z-index: 50;
    }

    .dropdown-container .dropdown {
        position: relative;
    }

    .dropdown-container .dropdown[open] .with-down-arrow::after {
        content: "";
    }

    .dropdown-container .dropdown[open] summary {
        background: #ffffff10;

    }

    .dropdown-container .dropdown summary {
        list-style: none;
        display: inline-block;
        cursor: pointer;
        border-radius: 6px;
        font-weight: bold;
    }

    .dropdown-container .dropdown summary .with-down-arrow {
        display: inline-flex;
        padding: 5px;
        align-items: center;
        color: var(--text_white);
        line-height: 1;

        :hover {
            color: var(--orange);
        }
    }

    .dropdown-container .dropdown summary .with-down-arrow::after {
        content: "";
        font-weight: normal;
        font-style: normal;
        font-size: 1.5rem;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -webkit-font-smoothing: antialiased;
    }

    .dropdown-container .dropdown.left ul {
        left: 0;
    }

    .dropdown-container .dropdown.right ul {
        right: 0;
    }

    .dropdown-container .dropdown ul {
        padding: 0;
        margin: 0;
        box-shadow: 0 0 10px #00000030;
        min-width: max-content;
        position: absolute;
        top: 100%;
        border-radius: 10px;
        color: var(--text_white);
        z-index: 2;
    }

    .dropdown-container .dropdown ul li {
        list-style-type: none;
        display: block;
        background-color: var(--grey);

        /* If you use divider & borders, it's best to use top borders */
        /*border-top: 1px solid #ccc;*/
    }

    .dropdown-container .dropdown ul li:first-of-type {
        border: none;
    }

    .dropdown-container .dropdown ul li form {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 10px 15px;
        text-decoration: none;
        line-height: 1;
        color: var(--text_white);
        cursor: pointer;
        font-weight: 700;
        font-size: 20px;
    }

    .dropdown-container .dropdown ul li form:hover {
        color: var(--orange);
    }

    .dropdown-container .dropdown ul li p {
        padding: 10px 15px;
        margin: 0;
    }

    .dropdown-container .dropdown ul li a {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 10px 15px;
        text-decoration: none;
        line-height: 1;
        color: var(--text_white);
    }

    .dropdown-container .dropdown ul li a:hover {
        color: var(--orange);
    }

    .dropdown-container .dropdown ul li:first-of-type {
        border-radius: 10px 10px 0 0;
    }

    .dropdown-container .dropdown ul li:last-of-type {
        border-radius: 0 0 10px 10px;
    }

    .dropdown-container .dropdown ul li.divider {
        border: none;
        border-bottom: 1px solid var(--orange);
        /* 
   * removes border from Li after the divider element
   * best used in combination with top borders on other LIs 
   */
    }

    .dropdown-container .dropdown ul li.divider~li {
        border: none;
    }
</style>