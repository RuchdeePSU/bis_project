/*
Property Types:
1-บ้านเดียว
2-บ้านแฝด
3-ทาวน์เฮาส์+ทาวน์โฮม
4-คอนโดมิเนียม
5-อาคารพานิชย์
6-อื่นๆ

JSON properties:
['ชื่อโครงการ', 'ที่ตั้ง', ราคาจำหน่าย, ละติจูด, ลองจิจูด, "Link to the property detail page", "Property thumbnail image", "Property type icon", "เทศบาลที่ตั้งโครงการ", "Property types", ราคาต่ำสุด, ราคาสูงสุด]
*/
var locations = [
  ["ปิยะทรัพย์ บ้านไร่", "88/5 หมู่ 8 ถ.บ้านไร่-ทุ่งขมิ้น ต.บ้านพรุ", "฿2,300,000-฿2,800,000", 6.896111, 100.476111, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "1", 2300000, 2800000],
  /*
  ["ปิยะทรัพย์ บ้านไร่ [บ้านเดี่ยว]", "88/5 หมู่ 8 ถ.บ้านไร่-ทุ่งขมิ้น ต.บ้านพรุ", "฿2,300,000-฿2,800,000", 6.896111, 100.476111, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "1", 2300000, 2800000],
  ["ปิยะทรัพย์ บ้านไร่ [ทาวน์โฮม]", "88/5 หมู่ 8 ถ.บ้านไร่-ทุ่งขมิ้น ต.บ้านพรุ", "฿1,790,000", 6.8955, 100.4763, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "3", 0, 1790000],
  */

  ["ฮาร์โมนีบิซ", "ต.บ้านพรุ อ.หาดใหญ่", "฿2,800,000-฿3,400,000", 6.97166667, 100.475, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2800000, 3400000],
  /*
  ["ฮาร์โมนีบิซ [อาคารพานิชย์ 2 ชั้น]", "ต.บ้านพรุ อ.หาดใหญ่", "฿2,800,000-฿3,400,000", 6.97166667, 100.475, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2800000, 3400000],
  ["ฮาร์โมนีบิซ [อาคารพานิชย์ > 2 ชั้น]", "ต.บ้านพรุ อ.หาดใหญ่", "฿4,010,000-฿8,870,000", 6.97166, 100.4755, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 4010000, 8870000],
  */

  ["ฮาร์โมนีวิลล์ 1", "ต.บ้านพรุ อ.หาดใหญ่", "฿3,300,000-฿4,000,000", 6.98055556, 100.47527778, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "2", 3300000, 4000000],
  /*
  ["ฮาร์โมนีวิลล์ 1 [บ้านแฝด 2 ชั้น]", "ต.บ้านพรุ อ.หาดใหญ่", "฿3,300,000-฿4,000,000", 6.98055556, 100.47527778, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "2", 3300000, 4000000],
  ["ฮาร์โมนีวิลล์ 1 [ทาวน์โฮม 2 ชั้น]", "ต.บ้านพรุ อ.หาดใหญ่", "฿1,690,000-฿2,500,000", 6.9805888, 100.4758333, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "3", 1690000, 2500000],
  ["ฮาร์โมนีวิลล์ 1 [อาคารพานิชย์ > 2 ชั้น]", "ต.บ้านพรุ อ.หาดใหญ่", "฿3,800,000-฿5,490,000", 6.9802111, 100.4756333, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 3800000, 5490000],
  */

  ["ฮาร์โมนีวิลล์ 3", "บ้านโป๊ะหมอ ต.บ้านพรุ อ.หาดใหญ่", "฿2,420,000-฿5,200,000", 6.9325, 100.46916667, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2420000, 5200000],

  ["วิรากร คลาสสิค", "70 ถ.เอเชีย ต.บ้านพรุ อ.หาดใหญ่", "฿4,500,000", 6.986529, 100.504121, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 4500000, 4500000],

  ["ฉัตรทองพาวิลเลี่ยน 5 เฟส 2", "ต.บ้านพรุ อ.หาดใหญ่", "฿3,500,000-฿4,500,000", 6.91972222, 100.45861111, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 3500000, 4500000],

  ["ดิ ออกซิเจน", "27 ถ.กาญจวนิช ต.ควนลัง อ.หาดใหญ่", "฿12,900,000-฿17,900,000", 6.98527778, 100.49250000, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "???", "5", 12900000, 17900000],

  ["อาเซียน ซิตี้ รีสอร์ท", "ถ.กาญจวนิช ต.หาดใหญ่ อ.หาดใหญ่", "฿1,900,000-฿4,700,000", 6.99472222, 100.48527778, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 1900000, 4700000],

  ["เบญจพร คลองหวะ", "ต.คอหงส์ อ.หาดใหญ่", "฿2,800,000-฿7,200,000", 6.97265833, 100.48944444, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 2800000, 7200000],

  ["ปาล์มสปริงส์ 8", "ถ.คลองยาเหนือ 9 ต.บ้านพรุ อ.หาดใหญ่", "฿1,850,000-฿4,470,000", 6.94611111, 100.47888889, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 1850000, 4470000],

  ["ปาล์มสปริงส์ 9", "ถ.กาญจวนิช ต.บ้านพรุ อ.หาดใหญ่", "฿3,410,000-฿6,270,000", 6.93916667, 100.46861111, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 3410000, 6270000],

  ["ปาล์มสปริงส์ 10", "ถ.พรุค้างคาว ต.บ้านพรุ อ.หาดใหญ่", "฿2,880,000-฿4,850,000", 6.91972222, 100.46444444, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2880000, 4850000],

  *["นีโอสมาร์ท พรุธานี", "ถ.บ้านพรุธานี ต.บ้านพรุ อ.หาดใหญ่", "฿5,500,000-฿15,100,000", 6.939991, 100.46805, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 5500000, 15100000],

  *["นีโอสมาร์ท คลองหวะ", "ซ.อิสรภาพ 2 ต.คอหงส์ อ.หาดใหญ่", "฿2,500,000-฿4,500,000", 6.972639, 100.474699, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 2500000, 4500000],

  *["นีโอสมาร์ท บ้านพรุ", "ถ.กาญจวนิช ต.บ้านพรุ อ.หาดใหญ่", "฿2,100,000-฿5,000,000", 6.9369332, 100.4683856, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2100000, 5000000],

  *["นีโอสมาร์ท บิ๊กซีเอ๊กซ์ตร้า", "ซ.ทุ่งรวงทอง ม.1 ต.คอหงส์ อ.หาดใหญ่", "฿3,500,000-฿4,100,000", 7.031108, 100.486528, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 3500000, 4100000],

  ["ดิ แอทริบิว", "64/141 ซ.5 ถ.กาญจวนิช ต.คอหงส์ อ.หาดใหญ่", "฿990,000-฿4,590,000", 7.03500000, 100.50027778, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 990000, 4590000],

  ["ดิ โอทาวน์", "ถ.กาญจวนิช ต.บ้านพรุ อ.หาดใหญ่", "฿5,000,000-฿5,590,000", 6.92833333, 100.46861111, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 5000000, 5590000],

  ["บ้านสวนวังนนท์", "ถ.บ้านพรุธานี ต.บ้านพรุ อ.หาดใหญ่", "฿2,900,000-฿7,300,000", 6.93444444, 100.45388889, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2900000, 7300000],

  ["บ้านชมกรีนวิว", "ถ.บ้านพรุธานี ต.บ้านพรุ อ.หาดใหญ่", "฿1,990,000-฿4,590,000", 6.93555556, 100.45611111, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 1990000, 4590000],

  ["พฤกษาวิลล์", "ถ.บ้านพรุธานี ต.บ้านพรุ อ.หาดใหญ่", "฿2,900,000-฿4,900,000", 6.93583333, 100.45861111, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2900000, 4900000],

  ["พราววิลเลจ บ้านพรุ", "ต.บ้านพรุ อ.หาดใหญ่", "฿2,400,000-฿3,500,000", 6.96055556, 100.46583333, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "บ้านพรุ", "5", 2400000, 3500000],

  ["บ้านแฝดเพชรไพลิน", "ถ.หาดใหญ่-จะนะ ต.คอหงส์ อ.หาดใหญ่", "฿5,900,000-฿7,900,000", 6.96944444, 100.49916667, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 5900000, 7900000],

  ["เดอะ คาแนลวิลเลจ", "ม.7 ถ.หาดใหญ่-จะนะ ต.คอหงส์ อ.หาดใหญ่", "฿6,500,000-฿6,900,000", 6.96805556, 100.50305556, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 6500000, 6900000],

  ["ดีคอนโด กาญจนวนิช", "9 ถ.กาญจนวนิช ต.คอหงส์ อ.หาดใหญ่", "฿1,300,000-฿2,000,000", 6.97944444, 100.48444444, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "คอหงส์", "5", 1300000, 2000000],

  //Zone3 ยังไม่ใส่ข้อมูลราคา
  *["อีซีโอ (เดอะกรีน พร้อพเพอตี้)", "ถ.บ้านหน้าควน-บ้านพรุ ม.1 ต.ควนลัง", "฿0-฿0", 6.97174, 100.4474, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  *["บ้านสวนวงษ์ทอง", "665/18 ม.1 ถ.ฐานุดมอนุสรณ์ ต.ควนลัง", "฿0-฿0", 6.97951, 100.44203, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  *["บ้านสวนวงษ์ทอง 2", "665/18 ม.1 ถ.ฐานุดมอนุสรณ์ ต.ควนลัง", "฿0-฿0", 6.9786, 100.44056, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  *["บ้านสวนวงษ์ทอง 3", "665/18 ม.1 ถ.ฐานุดมอนุสรณ์ ต.ควนลัง", "฿0-฿0", 6.97901, 100.44212, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  *["วิลลาจิโอ้ (Villagio)", "ถ.ลพบุรีราเมศวร์-สนามบิน ต.ควนลัง", "฿0-฿0", 6.98175, 100.42626, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  //ที่อยู่ไม่ตรงกับแผนที่
  ["สกายปาร์ค", "254/36 ถ.พลพิชัย ต.หาดใหญ่ อ.หาดใหญ่", "฿0-฿0", 6.97741, 100.42658, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "หาดใหญ่", "5", 1300000, 2000000],

  ["ปาล์มสปริง แกรนวิลล์", "1468/218 ซิตี้รีสอร์ท ชั้น 3 ถ.กาญจนวนิชย์", "฿0-฿0", 6.97079, 100.42979, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["พรีเมี่ยมเฮาส์", "ถ.สนามบิน ต.ควนลัง อ.หาดใหญ่", "฿0-฿0", 6.96664, 100.42786, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["ปาล์มสปริง 7", "1468/218 ซิตี้รีสอร์ท ชั้น 3 ถ.กาญจนวนิชย์", "฿0-฿0", 6.9598, 100.42443, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["ปาล์มสปริง 11", "1468/218 ซิตี้รีสอร์ท ชั้น 3 ถ.กาญจนวนิชย์", "฿0-฿0", 6.95718, 100.42615, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["เออบาน่า (Urbana)", "ถ.สนามบิน ต.ควนลัง อ.หาดใหญ่", "฿0-฿0", 6.95326, 100.41906, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["พรรณพฤกษา", "1901 ถ.สนามบิน-ลพบุรีราเมศวร์ ต.ควนลัง", "฿0-฿0", 6.95216, 100.41859, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["อภิไพบูลย์ทรัพย์", "1919/33 ม.6 ถ.สนามบิน ต.ควนลัง", "฿0-฿0", 6.95069, 100.41739, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["แก้วไพริน 3", "ต.ควนลัง อ.หาดใหญ่", "฿0-฿0", 6.92172, 100.39453, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["เดอะมิวส์", "ต.ควนลัง อ.หาดใหญ่", "฿0-฿0", 6.99345, 100.41235, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["บ้านประกายทอง", "ต.ควนลัง อ.หาดใหญ่", "฿0-฿0", 6.99878, 100.42359, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000],

  ["กรีนเพลส ควนลัง", "182 ม.2 ถ.เพชรเกษม ต.ควนลัง อ.หาดใหญ่", "฿0-฿0", 6.99432, 100.42399, "property-detail.html", "assets/img/properties/property-sample.jpg", "assets/img/property-types/single-family.png", "ควนลัง", "5", 1300000, 2000000]



  /*
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 6.97166667, 100.475, "property-detail.html", "assets/img/properties/property-02.jpg", "assets/img/property-types/apartment.png"]

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.87, 2.29, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/apartment.png"]

  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.866876, 2.309639, "property-detail.html", "assets/img/properties/property-02.jpg", "assets/img/property-types/apartment.png"],

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.874796, 2.299275, "property-detail.html", "assets/img/properties/property-03.jpg", "assets/img/property-types/construction-site.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.864194, 2.288868, "property-detail.html", "assets/img/properties/property-04.jpg", "assets/img/property-types/cottage.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.881187, 2.276938, "property-detail.html", "assets/img/properties/property-06.jpg", "assets/img/property-types/garage.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.859098, 2.423515, "property-detail.html", "assets/img/properties/property-08.jpg", "assets/img/property-types/houseboat.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.872296, 2.287796, "property-detail.html", "assets/img/properties/property-07.jpg", "assets/img/property-types/land.png"],

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.874457, 2.254386, "property-detail.html", "assets/img/properties/property-09.jpg", "assets/img/property-types/single-family.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.875191, 2.252412, "property-detail.html", "assets/img/properties/property-10.jpg", "assets/img/property-types/villa.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.864352, 2.257218, "property-detail.html", "assets/img/properties/property-11.jpg", "assets/img/property-types/vineyard.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.858648, 2.273526, "property-detail.html", "assets/img/properties/property-12.jpg", "assets/img/property-types/warehouse.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.856277, 2.264256, "property-detail.html", "assets/img/properties/property-13.jpg", "assets/img/property-types/industrial-site.png"],

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.859988, 2.252991, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/apartment.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.856954, 2.283912, "property-detail.html", "assets/img/properties/property-05.jpg", "assets/img/property-types/condominium.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.879268, 2.270672, "property-detail.html", "assets/img/properties/property-06.jpg", "assets/img/property-types/construction-site.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.875925, 2.3239098, "property-detail.html", "assets/img/properties/property-03.jpg", "assets/img/property-types/cottage.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.870393, 2.327771, "property-detail.html", "assets/img/properties/property-04.jpg", "assets/img/property-types/houseboat.png"],

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.880328, 2.307258, "property-detail.html", "assets/img/properties/property-08.jpg", "assets/img/property-types/land.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.880284, 2.306721, "property-detail.html", "assets/img/properties/property-09.jpg", "assets/img/property-types/single-family.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.860342, 2.304597, "property-detail.html", "assets/img/properties/property-10.jpg", "assets/img/property-types/vineyard.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.852549, 2.329574, "property-detail.html", "assets/img/properties/property-11.jpg", "assets/img/property-types/warehouse.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.857124, 2.316699, "property-detail.html", "assets/img/properties/property-12.jpg", "assets/img/property-types/empty.png"],

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.869433, 2.315068, "property-detail.html", "assets/img/properties/property-13.jpg", "assets/img/property-types/apartment.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.885916, 2.297130, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/industrial-site.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.893534, 2.276616, "property-detail.html", "assets/img/properties/property-02.jpg", "assets/img/property-types/construction-site.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.872570, 2.237349, "property-detail.html", "assets/img/properties/property-03.jpg", "assets/img/property-types/cottage.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.879344, 2.226191, "property-detail.html", "assets/img/properties/property-04.jpg", "assets/img/property-types/garage.png"],
  */
   /*
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.860374, 2.222242, "property-detail.html", "assets/img/properties/property-05.jpg", "assets/img/property-types/condominium.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.845917, 2.265673, "property-detail.html", "assets/img/properties/property-06.jpg", "assets/img/property-types/cottage.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.843092, 2.306013, "property-detail.html", "assets/img/properties/property-07.jpg", "assets/img/property-types/warehouse.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.887697, 2.332277, "property-detail.html", "assets/img/properties/property-08.jpg", "assets/img/property-types/apartment.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.871441, 2.347555, "property-detail.html", "assets/img/properties/property-07.jpg", "assets/img/property-types/empty.png"],

  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.832438, 2.369270, "property-detail.html", "assets/img/properties/property-09.jpg", "assets/img/property-types/apartment.png"],
  ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.803954, 2.275200, "property-detail.html", "assets/img/properties/property-10.jpg", "assets/img/property-types/apartment.png"],
  ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.879183, 2.252133, "property-detail.html", "assets/img/properties/property-11.jpg", "assets/img/property-types/construction-site.png"],

   ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.845092, 2.187996, "property-detail.html", "assets/img/properties/property-06.jpg", "assets/img/property-types/cottage.png"],
   ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.909218, 2.179756, "property-detail.html", "assets/img/properties/property-07.jpg", "assets/img/property-types/single-family.png"],

   ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.910120, 2.352104, "property-detail.html", "assets/img/properties/property-01.jpg", "assets/img/property-types/warehouse.png"],
   ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.867681, 2.396736, "property-detail.html", "assets/img/properties/property-05.jpg", "assets/img/property-types/empty.png"],
   ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.826109, 2.350731, "property-detail.html", "assets/img/properties/property-06.jpg", "assets/img/property-types/industrial-site.png"],
   ['3398 Lodgeville Road', "Golden Valley, MN 55427", "$28,000", 48.794908, 2.353477, "property-detail.html", "assets/img/properties/property-03.jpg", "assets/img/property-types/warehouse.png"],
   ['2479 Murphy Court', "Minneapolis, MN 55402", "$36,000", 48.859098, 2.423515, "property-detail.html", "assets/img/properties/property-04.jpg", "assets/img/property-types/empty.png"]

   */
];
