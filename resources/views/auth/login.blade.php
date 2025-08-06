<x-flex-layout flexTitle="Login">

    <form action="" method="post">
        <x-forms.input type="email" placeholder="Your Email"/>
        <x-forms.input type="password" placeholder="Your Password"/>
        <x-auth.password-reset/>
        <x-forms.button text="Login"></x-forms.button>
        <x-auth.social-buttons/>
        <x-auth.signup/>
    </form>

</x-flex-layout>
