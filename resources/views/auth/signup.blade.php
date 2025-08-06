<x-flex-layout flexTitle="Signup">

    <form action="" method="post">
        <x-forms.input type="email" placeholder="Your Email"/>
        <x-forms.input type="password" placeholder="Your Password"/>
        <x-forms.input type="password" placeholder="Repeat Password"/>
        <hr/>
        <x-forms.input placeholder="First Name"/>
        <x-forms.input placeholder="Last Name"/>
        <x-forms.input placeholder="Phone"/>

        <x-auth.have-account/>
        <x-forms.button text="Register"></x-forms.button>
        <x-auth.social-buttons/>
    </form>

</x-flex-layout>
