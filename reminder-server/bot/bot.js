const express = require("express");
const puppeteer = require("puppeteer");

const app = express();
app.use(express.urlencoded({ extended: false }));

const flag = "igoh25{f6174179c90c0366b99d7a1d91cf6f4a}";

async function visit(path) {
  let browser;
  try {
    browser = await puppeteer.launch({
      headless: true,
      args: ["--no-sandbox", "--disable-dev-shm-usage"],
    });

    const page = await browser.newPage();

    await page.setCookie({
      name: "flag",
      value: flag,
      domain: "server",
      path: "/",
    });

    const url = `http://server/${path}`;
    console.log("[BOT] visiting:", url);

    await page.goto(url, { waitUntil: "networkidle2" });
  } catch (e) {
    console.error("[BOT ERROR]", e.message);
  } finally {
    if (browser) await browser.close();
  }
}

app.get("/", (req, res) => {
  res.send("bot");
});

app.get("/bot", (req, res) => {
  res.send(`
    <h2>Admin Bot</h2>
    <form method="POST">
		<pre>http://server/<input id="path" name="path" required></pre>
      <button>Visit</button>
    </form>
  `);
});

app.post("/bot", (req, res) => {
  const path = req.body.path;
  visit(path);
  res.send("Success");
});

app.listen(8000, () => console.log("Bot listening on 8000"));
