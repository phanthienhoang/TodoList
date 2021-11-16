<!-- Masthead -->
<style>
    /*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 320). 
            
The 'supports' rule will only run if your browser supports CSS grid.

Flexbox is used as a fallback so that browsers which don't support grid will still recieve an identical layout.

*/

/* Base styles */

:root {
    font-size: 10px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    background-color: #0079bf;
}

.container {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
}

.btn {
    display: flex;
    justify-content: center;
    align-items: center;
    font: inherit;
    background: none;
    border: none;
    color: inherit;
    padding: 0;
    cursor: pointer;
}

:focus {
    outline-color: #fa0;
}

/* Masthead */

.masthead {
    flex-basis: 4rem;
    display: flex;
    align-items: center;
    padding: 0 0.8rem;
    background-color: #0067a3;
    box-shadow: 0 0.1rem 0.1rem rgba(0, 0, 0, 0.1);
}

.masthead .btn {
    background-color: #4c94be;
    border-radius: 0.3rem;
    transition: background-color 150ms;
}

.masthead .btn:hover {
    background-color: #3385b5;
}

.boards-menu {
    display: flex;
    flex-shrink: 0;
}

.boards-btn {
    flex-basis: 9rem;
    font-size: 1.4rem;
    font-weight: 700;
    color: #fff;
    margin-right: 0.8rem;
    padding: 0.6rem 0.8rem;
}

.boards-btn-icon {
    font-size: 1.7rem;
    padding-right: 1.2rem;
}

.board-search {
    flex-basis: 18rem;
    position: relative;
}

.board-search-input {
    height: 3rem;
    border: none;
    border-radius: 0.3rem;
    background-color: #4c94be;
    width: 100%;
    padding: 0 3rem 0 1rem;
    color: #fff;
}

.board-search-input:hover {
    background-color: #66a4c8;
}

.search-icon {
    font-size: 1.5rem;
    position: absolute;
    top: 50%;
    right: 0.8rem;
    transform: translateY(-50%) rotate(90deg);
    color: #fff;
}

.user-settings {
    display: flex;
    height: 3rem;
    color: #fff;
}

.user-settings-btn {
    font-size: 1.5rem;
    width: 3rem;
    margin-right: 0.8rem;
}

.user-settings-btn:last-of-type {
    margin-right: 0;
}

/* Board info bar */

.board-info-bar {
    flex-basis: 3rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0.8rem 0;
    padding: 0 1rem;
    color: #f6f6f6;
}

.board-info-bar .btn {
    font-size: 1.4rem;
    font-weight: 400;
    transition: background-color 150ms;
    padding: 0 0.6rem;
    border-radius: 0.3rem;
    height: 3rem;
}

.board-info-bar .btn:hover {
    background-color: #006aa8;
}

.private-btn-icon,
.menu-btn-icon {
    padding-right: 0.6rem;
    white-space: nowrap;
}

.board-title h2 {
    font-size: 1.8rem;
    font-weight: 700;
    white-space: nowrap;
}

/* Lists */

.lists-container::-webkit-scrollbar {
    height: 2.4rem;
}

.lists-container::-webkit-scrollbar-thumb {
    background-color: #66a3c7;
    border: 0.8rem solid #0079bf;
    border-top-width: 0;
}

.lists-container {
    display: flex;
    align-items: start;
    padding: 0 0.8rem 0.8rem;
    overflow-x: auto;
    height: calc(100vh - 8.6rem);
}

.list {
    flex: 0 0 27rem;
    display: flex;
    flex-direction: column;
    background-color: #e2e4e6;
    max-height: calc(100vh - 11.8rem);
    border-radius: 0.3rem;
    margin-right: 1rem;
}

.list:last-of-type {
    margin-right: 0;
}

.list-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    padding: 1rem;
}

.list-items {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-content: start;
    padding: 0 0.6rem 0.5rem;
    overflow-y: auto;
}

.list-items::-webkit-scrollbar {
    width: 1.6rem;
}

.list-items::-webkit-scrollbar-thumb {
    background-color: #c4c9cc;
    border-right: 0.6rem solid #e2e4e6;
}

.list-items li {
    font-size: 1.4rem;
    font-weight: 400;
    line-height: 1.3;
    background-color: #fff;
    padding: 0.65rem 0.6rem;
    color: #4d4d4d;
    border-bottom: 0.1rem solid #ccc;
    border-radius: 0.3rem;
    margin-bottom: 0.6rem;
    word-wrap: break-word;
    cursor: pointer;
}

.list-items li:last-of-type {
    margin-bottom: 0;
}

.list-items li:hover {
    background-color: #eee;
}

.add-card-btn {
    display: block;
    font-size: 1.4rem;
    font-weight: 400;
    color: #838c91;
    padding: 1rem;
    text-align: left;
    cursor: pointer;
}

.add-card-btn:hover {
    background-color: #cdd2d4;
    color: #4d4d4d;
    text-decoration: underline;
}

.add-list-btn {
    flex: 0 0 27rem;
    display: block;
    font-size: 1.4rem;
    font-weight: 400;
    background-color: #006aa7;
    color: #a5cae0;
    padding: 1rem;
    border-radius: 0.3rem;
    cursor: pointer;
    transition: background-color 150ms;
    text-align: left;
}

.add-list-btn:hover {
    background-color: #005485;
}

.add-card-btn::after,
.add-list-btn::after {
    content: '...';
}


@supports (display: grid) {
    body {
        display: grid;
        grid-template-rows: 4rem 3rem auto;
        grid-row-gap: 0.8rem;
    }

    .masthead {
        display: grid;
        grid-template-columns: auto 1fr auto;
        grid-column-gap: 2rem;
    }

    .boards-menu {
        display: grid;
        grid-template-columns: 9rem 18rem;
        grid-column-gap: 0.8rem;
    }

    .user-settings {
        display: grid;
        grid-template-columns: repeat(4, auto);
        grid-column-gap: 0.8rem;
    }

    .lists-container {
        display: grid;
        grid-auto-columns: 30rem;
        grid-auto-flow: column;
        grid-column-gap: 5rem;
    }

    .list {
        display: grid;
        grid-template-rows: auto minmax(auto, 1fr) auto;
    }

    .list-items {
        display: grid;
        grid-row-gap: 0.6rem;
    }

    .logo,
    .list,
    .list-items li,
    .boards-btn,
    .board-info-bar,
    .board-controls .btn,
    .user-settings-btn {
        margin: 0;
    }
}

</style>
<!-- <header class="masthead">

	<div class="user-settings">

		<button class="user-settings-btn btn" aria-label="Create">
			<i class="fas fa-plus" aria-hidden="true"></i>
		</button>

		<button class="user-settings-btn btn" aria-label="Information">
			<i class="fas fa-info-circle" aria-hidden="true"></i>
		</button>

		<button class="user-settings-btn btn" aria-label="Notifications">
			<i class="fas fa-bell" aria-hidden="true"></i>
		</button>

		<button class="user-settings-btn btn" aria-label="User Settings">
			<i class="fas fa-user-circle" aria-hidden="true"></i>
		</button>

	</div>

</header> -->
<!-- End of masthead -->


<!-- Board info bar -->
<section class="board-info-bar container">

<div class="">

    <h2>Work space</h2>

</div>


</section>

<div class="container">

    <!-- End of board info bar -->

    <!-- Lists container -->
    <section class="lists-container">

        <div class="list">

            <h3 class="list-title">Tasks to Do</h3>

            <ul class="list-items">
                <li>Complete mock-up for client website</li>
                <li>Email mock-up to client for feedback</li>
                <li>Update personal website header background image</li>
                <li>Update personal website heading fonts</li>
                <li>Add google map to personal website</li>
                <li>Begin draft of CSS Grid article</li>
                <li>Read new CSS-Tricks articles</li>
                <li>Read new Smashing Magazine articles</li>
                <li>Read other bookmarked articles</li>
                <li>Look through portfolios to gather inspiration</li>
                <li>Create something cool for CodePen</li>
                <li>Post latest CodePen work on Twitter</li>
                <li>Listen to new Syntax.fm episode</li>
                <li>Listen to new CodePen Radio episode</li>
            </ul>

            <button class="add-card-btn btn">Add a card</button>

        </div>

        <div class="list">

            <h3 class="list-title">Doing</h3>

            <ul class="list-items">
                <li>Clear email inbox</li>
                <li>Finalise requirements for client web design</li>
                <li>Begin work on mock-up for client website</li>
                <li>Finalise requirements for client web design</li>
                <li>Begin work on mock-up for client website</li>
                <li>Finalise requirements for client web design</li>
                <li>Begin work on mock-up for client website</li>
            </ul>

            <button class="add-card-btn btn">Add a card</button>

        </div>
        <div class="list">

            <h3 class="list-title">Complete</h3>

            <ul class="list-items">
                <li>Clear email inbox</li>
                <li>Finalise requirements for client web design</li>
                <li>Begin work on mock-up for client website</li>
                <li>Finalise requirements for client web design</li>
                <li>Begin work on mock-up for client website</li>
                <li>Finalise requirements for client web design</li>
                <li>Begin work on mock-up for client website</li>
            </ul>

            <button class="add-card-btn btn">Add a card</button>

        </div>

    </section>
</div>

<!-- End of lists container -->