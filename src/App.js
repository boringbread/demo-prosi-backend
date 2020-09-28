//import boostraplibrary
import "../node_modules/bootstrap/dist/css/bootstrap.min.css";
import "./App.css";
//import Router, Switch, Route, Link to change page
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
//import components to make content of a page
import React, { useState } from "react";
import SignUp from "./components/signup.component";
import Login from "./components/login.component";
import Header from './components/header/Header';
import Tamong from './components/pages/tataPamong/TataPamong';
import Home from './components/pages/home/Home';
import Input from './components/pages/mahasiwa/Input/Input';
import Asing from './components/pages/mahasiwa/Asing/Asing';
import Profil from './components/pages/SDM/Profil/Profil';
import Kinerja from './components/pages/SDM/Kinerja/Kinerja';
import Sarana from './components/pages/sarana/Sarana';
import Kepuasan from './components/pages/pendidikan/Kepuasan/Kepuasan';
import Kurikulum from './components/pages/pendidikan/Kurikulum/Kurikulum';
import Penelitian from './components/pages/pendidikan/Penelitian/Penelitian';
import penelitianMHS from './components/pages/penelitian/Mahasiswa/Mahasiswa';
import Mahasiswa from './components/pages/penelitian/Mahasiswa/Mahasiswa';
import PengabdianMasyarakat from './components/pages/pengabdianMasyarakat/PengabdianMasyarakat';
import CapaianPembelajaran from './components/pages/capaian/capaianPembelajaran/CapaianPembelajaran';
import DayaSaing from './components/pages/capaian/DayaSaing/DayaSaing';
import KinerjaLulusan from './components/pages/capaian/KinerjaLulusan/KinerjaLulusan';
import PrestasiMahasiswa from './components/pages/capaian/prestasiMahasiswa/PrestasiMahasiswa';
import Produktivitas from './components/pages/capaian/Produktivitas/Produktivitas';
import PenelitianPkm from './components/pages/capaian/PenelitianPkM/PenelitianPkM';
import DragAndDrop from './components/pages/dragAndDrop/TarikBuang';
import { AuthContext } from "./Auth_Context";
import PrivateRoute from "./Private_Route";
// import DragAndDrop from "./components/dragAndDrop.component";
// import Login from "./components/login.component";
// import Welcome from "./components/welcome.component";
// import Latihan_2 from "./components/latihan_2.component";
// import AddUser from "./components/adduser.component";
// import Update from "./components/update.component";
// import Goodbye from "./components/goodbye.component";
// import IndexJs from "./components/main.component";
// import registerServiceWorker from "./registerServiceWorker";

function App() {
  const [authTokens, setAuthTokens] = useState(
    localStorage.getItem("tokens") || ""
  );
  const setTokens = (data) => {
    localStorage.setItem("tokens", JSON.stringify(data));
    setAuthTokens(data);
  };
  const reducer = (state, action) => {
    switch (action.type) {
      case "SET_DROP_DEPTH":
        return { ...state, dropDepth: action.dropDepth };
      case "SET_IN_DROP_ZONE":
        return { ...state, inDropZone: action.inDropZone };
      case "ADD_FILE_TO_LIST":
        return { ...state, fileList: state.fileList.concat(action.files) };
      default:
        return state;
    }
  };

  const [data, dispatch] = React.useReducer(reducer, {
    dropDepth: 0,
    inDropZone: false,
    fileList: [],
  });

  return (
    <div className="App">
      <AuthContext.Provider value={{ authTokens, setAuthTokens: setTokens }}>
        <Header />
        {/* <AuthButton /> */}
        <Switch>
          <PrivateRoute exact path="/login" component={Login} />
          <PrivateRoute exact path="/sign-in" component={Login} />
          <PrivateRoute exact path="/sign-up" component={SignUp} />
          <Route path="/" exact component={Home} />
          <Route path="/tataPamong" component={Tamong} />
          <Route path="/inputMahasiswa" component={Input} />
          <Route path="/mahasiswaAsing" component={Asing} />
          <Route path="/profilDosen" component={Profil} />
          <Route path="/kinerjaDosen" component={Kinerja} />
          <Route path="/keuanganSarana" component={Sarana} />
          <Route path="/kepuasanMahasiswa" component={Kepuasan} />
          <Route path="/penelitianPendidikan" component={Penelitian} />
          <Route path="/dashPeneliatian" component={penelitianMHS} />
          <Route path="/kurikulum" component={Kurikulum} />
          <Route path="/melibatkanMahasiswa" component={Mahasiswa} />
          <Route path="/pengabdianMasyarakat" component={PengabdianMasyarakat} />
          <Route path="/capaianPembelajaran" component={CapaianPembelajaran} />
          <Route path="/kinerjaLulusan" component={KinerjaLulusan} />
          <Route path="/dayaSaing" component={DayaSaing} />
          <Route path="/prestasiMahasiswa" component={PrestasiMahasiswa} />
          <Route path="/produktivitas" component={Produktivitas} />
          <Route path="/penelitianPkm" component={PenelitianPkm} />
          <Route path="/draganddrop" component={DragAndDrop} />
          </Switch>
      </AuthContext.Provider>
    </div>
  );
}


export default App;
