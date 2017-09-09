## modules

1. authentication
   1. access control
2. internship approval
   1. student
   2. internship
   3. internship_site
   4. internship_supervisor
   5. ​
3. alum management
4. 进度管理
5. 可视化报表
6. 数据导入
7. 数据导出


## 流程
1. internship module
    1. 学生注册：填写实习注册表相关信息
    2. 然后签署风险说明书
    3. 提交注册，等待审核
    4. 一旦学生提交注册，就产生一个新task（因此需要一个task表，来记录进度）
    5. 学生填写实习注册时，应当采用逐步引导：

2. 学生界面：
    1. 首次使用
        1. iuid，iu_username
        2. password，first name, middle name, last name
        3. 然后跳转回学生log in界面
    2. 已注册过
        1. 直接登录
        2. 继续完成之前的申请

        或
        2. 新建internship application；每步都应当校验数据；所有field都是必填
            1. 选择organization
                1. 如果没有，则新建
            2. 选择location
                1. country
                    1. 选择完country后，自动监测country是否在危险名单中
                       1. 每24或12小时，自动去https://travel.state.gov/content/passports/en/alertswarnings.html抓取危险区域列表
                2. state/province
                3. city

            3. 自动判断是否有该organization在此location的supervisor信息
                1. 如有，则提供给学生选择
                    1. 如果没有学生的supervisor，则有学生新建/填写
                2. 如没有，则由学生填写
                    1. supervisor name
                    2. supervisor email
                    3. supervisor phone
            4. 填写liability release form
            5. 填写dates
                1. U.S. Departure/Return (Travel) Dates:
                2. Internship/Volunteer Experience (Work) Start/End Dates:
            6. detailed budget
                1. airfare; 
                2. living costs; 
                3. accommodations；
                4. etc.
            7. 填写工作细节
                1. detailed description of the internship experience and your specific duties
                2. work schedule(number of hours per week)
            8. Explain why this internship/volunteer opportunity was chosen (i.e., how will it help you in your educational and career goals):
            9. 提交申请(set "is_submitted" tag to true)
                * 提交之前，可随时save（update record without setting is_submitted to true）

## Access Control: internship module
1. 3 roles
    1. student
    2. supervisor
    3. intern_admin

2. user account

    |                               | student    | supervisor | intern_admin |
    | ----------------------------- | ---------- | ---------- | ------------ |
    | CREATE user (student) account | yes (self) | no         | no           |
    | UPDATE user(student) account  | yes (self) | no         | no           |
    | DELETE user(student) account  | yes (self) | no         | no           |
    | VIEW user(student) account    | yes (self) | no         | yes (all)    |

    ​

3. application

    |                    | student                         | supervisor | intern_admin |
    | ------------------ | ------------------------------- | ---------- | ------------ |
    | CREATE application | yes                             | no         | no           |
    | UPDATE applicaiton | own; NO update once submitted   | no         | no           |
    | DELETE application | own; NO deletion once submitted | no         | no           |
    | VIEW application   | yes (own)                       | no         | yes (all)    |

4. site_evaluation

    |        | student                         | supervisor | intern_admin |
    | ------ | ------------------------------- | ---------- | ------------ |
    | CREATE | yes                             | no         | no           |
    | UPDATE | own; NO update once submitted   | no         | no           |
    | DELETE | own; NO deletion once submitted | no         | no           |
    | VIEW   | yes (own)                       | no         | yes (all)    |

5. student_evaluation

    1. intern_admin generates a encrypted url pointing to a certain student_evaluation
    2. intern_admin sends the url via email to supervisor
    3. 用middleware迫使supervisor专项登陆页面
    4. supervisor logs in with a temp password
    5. redirect to the student evaluation
    6. supervisor fills the form
    7. supervisor submits the form
    8. 每个supervisor每次填写表格时，都应该有一个一次性的随机密码
    9. 当某个application的student evaluation被supervisor提交时，重置此supervisor的登陆密码
    10. 并且，在supervisor的登录页面上隐藏reset / forget password。
    11. 一旦提交，任何人都无法UPDATE or DELETE

6. organization

    1. 不同国家地区，两个不同的organizations完全同名怎么办？
    2. 是否需要organization表？
    3. 如果没有organization表，则supervisor表也没有意义。

7. supervisor
