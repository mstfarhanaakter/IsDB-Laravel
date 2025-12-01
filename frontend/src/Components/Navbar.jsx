
import { Link, NavLink } from "react-router-dom";

const Navbar = () => {

    const Links = <>
        <li className="list-none"><NavLink to='/'>Home</NavLink></li>
        <li className="list-none"><NavLink to='/about'>About</NavLink></li>
        {/* <li className="list-none"><NavLink to='/dashboard'>Dashboard</NavLink></li> */}
        <li className="list-none"><NavLink to='/login'>Login</NavLink></li>
        <li className="list-none"><NavLink to='/register'>Register</NavLink></li>
    </>

    return (
        <nav className=" from-sky-500 to-indigo-500 text-white shadow-lg fixed w-full z-50">
            <div className="max-w-7xl mx-auto px-4 md:px-8">
                <div className="flex justify-between items-center h-16">
                    {/* Logo */}
                    <div className="">
                        <h1 className="text-2xl font-bold tracking-wide hover:text-yellow-300 transition duration-300 cursor-pointer text-black">
                            FlowerFool
                        </h1>
                    </div>
                    {/* Desktop Menu */}
                    <div className="hidden md:flex items-center space-x-6 gap-3 text-black">
                        {Links}
                    </div>
                </div>
            </div>

            {/* Mobile Menu */}
            {open && (
                <div className="md:hidden bg-sky-500 bg-opacity-95 shadow-lg">
                    {Links}

                </div>
            )}
        </nav>
    );
};

export default Navbar;
