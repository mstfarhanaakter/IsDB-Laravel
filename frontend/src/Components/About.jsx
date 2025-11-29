// About.jsx
import { FaLeaf, FaSeedling, FaSmile } from 'react-icons/fa';

const About = () => {
  return (
    <section className="py-20 px-6 md:px-20 bg-gradient-to-r from-pink-50 via-purple-50 to-yellow-50 rounded-t-3xl">
      <h2 className="text-4xl font-bold text-center mb-12 text-pink-600 text-black">About FlowerShop</h2>

      <div className="grid md:grid-cols-3 gap-12 items-start text-center md:text-left">
        <div className="bg-white text-black p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
          <FaLeaf className="text-green-500 text-5xl mx-auto mb-4" />
          <h3 className="font-bold text-xl mb-2 text-pink-500">Fresh & Organic</h3>
          <p>We provide handpicked fresh flowers every day, ensuring the highest quality for your loved ones.</p>
        </div>
        <div className="bg-white text-black p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
          <FaSeedling className="text-yellow-500 text-5xl mx-auto mb-4" />
          <h3 className="font-bold text-xl mb-2 text-purple-500">Eco-Friendly</h3>
          <p>Our flowers are sourced responsibly with minimal impact on the environment. Sustainability is our priority.</p>
        </div>
        <div className="bg-white text-black p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300">
          <FaSmile className="text-pink-500 text-5xl mx-auto mb-4" />
          <h3 className="font-bold text-xl mb-2 text-yellow-500">Customer Happiness</h3>
          <p>We deliver smiles along with flowers. Your satisfaction and joy are what drive our service.</p>
        </div>
      </div>

      <div className="mt-16 text-center">
        <p className="text-gray-700 max-w-3xl mx-auto text-lg">
          FlowerShop is dedicated to bringing the beauty of nature to your home. From special occasions to everyday joy, 
          we offer a wide range of fresh, colorful blooms to suit every taste. Our team is passionate about flowers and committed to delivering happiness to our customers with every bouquet.
        </p>
      </div>
    </section>
  );
};

export default About;
